<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutUs(){
      if(trans('settings.rtl')){
        return view('about-us-fa');
      }
      return view('about-us');
    }
    public function help(){
      if(trans('settings.rtl')){
        return view('help-fa');
      }
      return view('help');
    }
}
