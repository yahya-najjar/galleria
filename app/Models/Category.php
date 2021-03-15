<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category  extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['sort_order', 'image', 'is_active', 'parent_category'];
    public $translatedAttributes = ['name'];


    public function parentCategory(): HasMany
    {
        return $this->hasMany(Category::class,'parent_category');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_category');
    }

    public function getTitleAttribute()
    {
        return $this->name;
    }

    public function getParent()
    {
        if ( !$this->getAttribute('parent_category'))
             return null;
         return $this->getAttribute('parent_category');
    }
}
