<div class="form-group row">
    <label class="col-xl-2 col-lg-2 col-form-label {{ $locale=='ar' ? 'float-right text-left' : 'text-right' }} @if($required) required @endif">
        {{ isset($item) ? __($item.'.'.$name) : __('admin.'.$name) }}
    </label>
    <div class="col-lg-4 col-md-11 col-sm-12">
        <div class="">
            @if($multiple)
                <input type="file"  data-container="body"  title="Multiple Images" data-toggle="popover" data-placement="right" data-content="{{ __('admin.u_can_upload_multiple_files') }}" name="{{ $name }}[]" multiple class="dropify" @if($required) required @endif data-default-file="{{ $oldValue && $oldValue->{$name} ? storageImage($oldValue->{$name}[0]) : '' }}" >
            @else
                <input type="file" name="{{ $name }}" value="{{$oldValue ? $oldValue->{$name} : ''}}" class="dropify" @if($required) required @endif data-default-file="{{ $oldValue ? storageImage($oldValue->{$name}) : '' }}">
            @endif
        </div>
    </div>
    @if($multiple)
        <div class="col-lg-4 col-md-3 mt-20 text-muted">
        </div>
    @endif
</div>
@if($multiple)
    @if($oldValue && $oldValue->{$name})
        <p class="float-right">current images <span class="badge-primary pl-2 pr-2" style="border-radius: 5px">{{ $oldValue ? sizeof($oldValue->{$name}) : '' }}</span></p>
        <div class="col-md-12 row" dir="rtl">
                @foreach($oldValue->{$name} as $singleImage)
                     <img width="20%" class="ml-4 mr-4" src="{{ storageImage($singleImage) }}" style="background-size: contain; border: solid red 1px; padding: 4px; border-radius: 5px">
                @endforeach
        </div>
    <br>
    <br>
    @endif
@endif
