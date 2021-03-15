<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    public function changeLanguage($local): RedirectResponse
    {

        if (array_key_exists($local, Config::get('languages'))) {
            App::setLocale($local);
            Config::set('translatable.locale', $local);
            Session::put('applocale', $local);
        }
        return redirect()->back();
    }


    function dashboard()
    {
        return view('admin.dashboard');
    }


}
