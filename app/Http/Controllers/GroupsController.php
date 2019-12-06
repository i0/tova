<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Request;
use Redirect;
use Session;
use Auth;

class GroupsController extends Controller
{
    /**
     * Home Page Controller
     *
     * @return Response
     */
    public function create()
    {
      return view('groups.add');
    }
    public function store(){
      if(!Request::get('name'))
        return redirect(action("GroupsController@create"))->with(['message' => 'Please enter the group name field', 'message-type' => 'red']);
      if(Group::where('name', Request::get('name'))->exists())
        return redirect(action("GroupsController@create"))->with(['message' => 'Group already exists', 'message-type' => 'red']);
      $group = new Group;
      $group->user_id = Auth::user()->id;
      $group->name = Request::get('name');
      $group->save();
      return redirect()->back()->with(['message' => 'Group Added', 'message-type' => 'green']);
    }
    public function index() {
      $groups = Group::all();
      return view('groups.index', compact('groups'));
    }
    public function delete(){
      $name = (Request::get('delete'));
      if(!$name)
        return redirect()->back()->with(['message' => 'Please select one group', 'message-type' => 'yellow']);
      Group::where('name', $name)->delete();
      return redirect()->back()->with(['message' => 'Group Deleted.']);
    }
}
