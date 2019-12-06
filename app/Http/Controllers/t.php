<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class t extends Controller
{
    function index(){
    	$user = User::find(1);
    	// dd($user);
    	dd($user->onTrial());
    }
}
