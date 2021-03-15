<?php

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function localImage($file, $default = '')
{
    if (!empty($file)) {
        return Str::of(Storage::disk('local')->url($file))->replace('storage', 'uploads');
    }

    return $default;
}

function storageImage($file, $default = '')
{
    if (!empty($file)) {
        return str_replace('\\', '/', Storage::disk('public')->url($file));
    }

    return $default;
}

function secToMin($seconds)
{
    return $seconds / 60;
}

function newStd($array = []): stdClass
{
    $std = new \stdClass();
    foreach ($array as $key => $value) {
        $std->$key = $value;
    }
    return $std;
}

function getStatusVariables(): array
{
    $active = newStd(['name' => __('admin.active'), 'value'=> 1]);
    $inactive = newStd(['name' => __('admin.inactive'), 'value'=> 0]);
    return [$active, $inactive];
}

function getRequiredSelect(): array
{
    $yes = newStd(['id' => 'Yes']);
    $no = newStd(['id' => 'NO']);
    return [$yes, $no];
}


function getCurrentLanguageSymbol(){
    return Session::get('applocale');
}


function getCategories($id = null)
{
    if ($id != null)
        return Category::all()->except($id);
    return Category::all();
}
