{{--Form Inputs--}}
    @if($locale == 'en')

        <x-text :name="'name'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-text>
        <x-text :name="'username'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-text>
        <x-email :name="'email'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-email>
        <x-password :name="'password'" :locale="''" :required="true"></x-password>
        <x-image :name="'avatar'" :locale="''" :oldValue="$entity ?? null"></x-image>
        <x-select :name="'role'" :locale="''" displayName="name" :multiple="true" :options="\Spatie\Permission\Models\Role::get()" :oldValues="isset($entity) ? $entity->roles()->pluck('id')->toArray() : null"></x-select>

    @endif
{{--End Form Inputs--}}
