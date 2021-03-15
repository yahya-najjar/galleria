{{--Form Inputs--}}
    @if($locale == 'en')
        <x-text :name="'first_name'" :locale="''" :oldValue="$entity ?? null"></x-text>
        <x-text :name="'last_name'" :locale="''" :oldValue="$entity ?? null"></x-text>
        <x-email :name="'email'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-email>
        <x-password :name="'password'" :locale="''" :required="true"></x-password>
        <x-text :name="'phone_number'" :locale="''" :oldValue="$entity ?? null"></x-text>
        <x-radio :name="'gender'" :choices="getGenderVariables()" :oldValue="$entity ?? null"></x-radio>
        <x-radio :name="'status'" :choices="getStatusVariables()" :oldValue="$entity ?? null"></x-radio>
        <x-date :name="'dob'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-date>
        <x-text :name="'street_address'" :locale="''" :oldValue="$entity ?? null"></x-text>
        <x-switch-form :name="'is_company'" :oldValue="$entity ?? null"></x-switch-form>
        <x-text :name="'post_code'" :locale="''" :oldValue="$entity ?? null"></x-text>
        <x-switch-form :name="'subscribe'" :oldValue="$entity ?? null"></x-switch-form>
        <x-select :name="'country_code_id'" :locale="''" displayName="name" :multiple="false" :options="\App\Models\CountryCode::get()" :oldValue="isset($entity) ? $entity->CountryCode : null"></x-select>
        <x-select :name="'area_id'" :locale="''" displayName="name" :multiple="false" :options="\App\Models\Area::get()" :oldValue="isset($entity) ? $entity->Area : null"></x-select>
        <x-select :name="'currency_id'" :locale="''" displayName="name" :multiple="false" :options="\App\Models\Currency::get()" :oldValue="isset($entity) ? $entity->Currency : null"></x-select>
        <x-image :name="'avatar'" :locale="''" :oldValue="$entity ?? null"></x-image>
    @endif
{{--End Form Inputs--}}
