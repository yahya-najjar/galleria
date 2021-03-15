{{--Form Inputs--}}
    <x-text :name="'name'" :locale="$locale" :oldValue="$entity ?? null" :required="true"></x-text>

    @if($locale == 'en')
        <x-number :name="'sort_order'" :oldValue="$entity ?? null" :required="true"></x-number>
        <x-select  displayName="name" :name="'parent_category'" :locale="$locale" :options="getCategories($entity->id ?? null)" :oldValue="$entity->category ?? null" ></x-select>
        <x-radio :name="'is_active'" :choices="getStatusVariables()" :oldValue="$entity ?? null"></x-radio>
        <div class="row col-md-12">
            <div style="padding-left: 120px;" class="col-md-6">
                <x-image :name="'image'" :oldValue="$entity ?? null" :required="true"></x-image>
            </div>
        </div>
    @endif

{{--End Form Inputs--}}
