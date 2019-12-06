<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Session;

class BillingController extends Controller
{
    function index(){
    	return view('billing.index');
    }

    function buy(){
    	$user = Auth::user();
    	$user->trial_ends_at = Carbon::now()->addDays(10);
    	$user->update();
    	Session::flash('message', '<i class="ion-information-circled"></i> You have successfully purchased a plan!');
    	// Session::flash();
    	return redirect(route('home'));
    }
}
