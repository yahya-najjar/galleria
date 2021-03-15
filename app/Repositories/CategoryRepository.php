<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class CategoryRepository {

    public function add(Request $request)
    {
        $category = new Category(populateModelData($request, Category::class));

        $category->sort_order = $request->input('sort_order') ?? 1;
        $category->is_active = $request->input('status') ?? 0;
        $category->category()->associate($category->getParent());

        if ($request->hasFile('image')){
            $category->image = Storage::disk('public')->put('categories', $request->file('image'));
            ImageOptimizer::optimize('storage/'.$category->image);
        }

        if ($request->hasFile('guide_image')){
            $category->guide_image = Storage::disk('public')->put('categories', $request->file('guide_image'));
            ImageOptimizer::optimize('storage/'.$category->image);
        }

        $category->save();
    }

    public function update(Request $request, Category $category)
    {
        $category->update(populateModelData($request, Category::class));

        $category->sort_order = $request->input('sort_order') ?? 1;

        // update subcategories parent id
        Category::where('parent_category', '=', $category->id)->update(['parent_category' => $request->input('parent_category')]);

        $category->category()->associate($category->getParent());

        if ($request->hasFile('image')){
            // if there is an old image delete it
            if ($category->image != null){
                $category->image = Storage::disk('public')->delete($category->image);
            }

            // store the new image
            $category->image = Storage::disk('public')->put('categories', $request->file('image'));
            ImageOptimizer::optimize('storage/'.$category->image);
        }

        if ($request->hasFile('guide_image')){
            // if there is an old guide_image delete it
            if ($category->guide_image != null){
                $category->guide_image = Storage::disk('public')->delete($category->guide_image);
            }

            // store the new guide_image
            $category->guide_image = Storage::disk('public')->put('categories', $request->file('guide_image'));
            ImageOptimizer::optimize('storage/'.$category->image);
        }

        $category->save();

    }

    public function delete(Category $category)
    {
        if ($category->image != null)
            $category->image = Storage::disk('public')->delete($category->image);

        if ($category->guide_image != null)
            $category->guide_image = Storage::disk('public')->delete($category->guide_image);

        $category->delete();
    }

    public function getCategories(Request $request, $categoryId = null)
    {
        $categories = Category::withTranslation();

        if ($request->query('status') == null && $request->query('search') == null ){
            $categories->where('parent_category' , null);
        }

        if ($categoryId != null){
            $categories->where('id', '<>', $categoryId);
        }

        if ($request->query('status') != null){
            $categories->where('is_active' , $request->query('status'));
        }

        if ($request->query('search') != null) {
            $tokens = convertToSeparatedTokens($request->query('search'));

            $categories->whereHas('translations', function ($query) use ($tokens, $request) {
                $query
                    ->whereRaw("MATCH(name) AGAINST(? IN BOOLEAN MODE)", $tokens);
            });
        }
        return $categories;
    }

}
