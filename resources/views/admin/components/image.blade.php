<br>
<br>
<div class="form-group row col-md-12 mt-10" dir="{{ $locale=='ar' ? 'rtl' : '' }}">
    <label style="white-space: nowrap;" class="col-xl-2 col-lg-2 col-form-label {{ $locale=='ar' ? 'float-right text-left' : 'text-right' }} @if($required) required @endif" >
        {{ isset($item) ? __($item.'.'. raw($name)) : __('admin.'.raw($name))}}
    </label>
    <div class="{{ $locale=='ar' ? 'mr-10' : 'ml-10' }} image-input border-red-500" id="{{ $name }}">
        @if(!$multiple)
            <div class="image-input-wrapper" style="background-image: url({{ $oldValue && $oldValue->{$name} != '' ? storageImage($oldValue->{$name}) : asset('custom/upload_simge.png') }}); background-size: contain"></div>
        @else
            <div class="image-input-wrapper" style="background-image: url({{ $oldValue && $oldValue->{$name} ? storageImage($oldValue->{$name}[0]) : asset('custom/upload_simge.png') }}); background-size: contain"></div>
        @endif
        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change"
               data-toggle="tooltip" title="" data-original-title="Change image">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" @if($multiple) multiple @else value="{{$oldValue && $oldValue->{$name} != ''? $oldValue->{$name} : '' }}" @endif name="{{ $name }}{{ $multiple ? '[]' : '' }}" accept=".png, .jpg, .jpeg" @if($required) required @endif />
            <input type="hidden" name="image_remove"/>
        </label>

        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel"
              data-toggle="tooltip" title="Cancel image">
            <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
    </div>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@if($multiple)
    @if($oldValue && $oldValue->{$name})
        <p class="float-right">current images <span class="badge-primary pl-2 pr-2" style="border-radius: 5px">{{ $oldValue && $oldValue->{$name} ? sizeof($oldValue->{$name}) : '' }}</span></p>
        <div class="col-md-12 row" dir="rtl">
                @foreach($oldValue->{$name} as $singleImage)
                     <img width="20%" class="ml-4 mr-4" src="{{ storageImage($singleImage) }}" style="background-size: contain; border: solid red 1px; padding: 4px; border-radius: 5px">
                @endforeach
        </div>
    <br>
    <br>
    @endif
@endif
