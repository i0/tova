<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->admin = 0;
        if($request->get('admin')){
          $user->admin = 1;
        }
        if($request->get('plan')){
          $plan = $request->get('plan');
          $user->plan = $plan;
          $plus = 0;
          switch($plan){
            case '1':
              $plus = 86400*31;
              break;
            case '2':
              $plus = 86400*31*2;
              break;
            case '3':
              $plus = 86400*31*3;
              break;
            case '4':
              $plus = 86400*31*12;
              break;
            case '5':
              $plus = 86400*31*12*2;
              break;
            case '6':
              $plus = 86400*31*12*3;
              break;
            case '7':
              $plus = 86400*31*12*100;
              break;
          }
          $user->trial_ends_at = date('Y-m-d H:i:s', time()+$plus);
        }
        $user->save();
        return redirect(action('UsersController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
