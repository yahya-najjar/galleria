<div class="form-group row" dir="{{ $locale=='ar' ? 'rtl' : '' }}">
    <label class="col-xl-2 col-lg-2 col-form-label {{ $locale=='ar' ? 'float-right text-left' : 'text-right' }} @if($required) required @endif">
        {{ isset($item) ? __($item.'.'.$name) : __('admin.'.$name) }}
    </label>
    <div class="col-lg-9 col-xl-9">
        <input class="form-control form-control-lg form-control-solid @error($name.':'.$locale) is-invalid @enderror"
               name="{{ $name }}"
               value="{{ $oldValue ? $oldValue->{$name} : old($name) }}"
               type="date" id="example-date-input"/>
    </div>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
