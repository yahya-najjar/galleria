<div class="form-group row" dir="{{ $locale=='ar' ? 'rtl' : '' }}">
    <label class="col-lg-2 col-form-label {{ $locale=='ar' ? 'float-right text-left' : 'text-right' }} @if($required) required @endif" for="{{ $name }}">
        {{ isset($item) ? __($item.'.'.$name) : __('admin.'.$name) }}
    </label>
    <div class="col-lg-9 col-xl-9">
    <input @if($required) required @endif class="form-control form-control-lg form-control-solid @error($name) is-invalid @enderror"
           placeholder="{{__('admin.enter')}} {{ isset($item) ? __($item.'.'.$name) : __('admin.'.$name)}}"
           name="{{ $name }}" type="number"
           value="{{ $oldValue ? $oldValue->{$name} : old($name) }}"
           id="{{ $name }}" min="{{ $min }}" max="{{ $max }}"
           @if($decimal)  step="any" @endif/>
    </div>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
