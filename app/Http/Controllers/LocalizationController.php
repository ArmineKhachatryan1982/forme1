<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    // public function index($locale)
    // {
    //     App::setLocale($locale);
    //     session()->put('locale', $locale);
    //     return redirect()->back();
    // }
    public function index(){
        return view('language');
    }
    public function lang_change(Request $request){
        // dd($request->lang);
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return view('language');
    }

}
