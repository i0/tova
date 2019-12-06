<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Group;
use Request;
use Redirect;
use Session;
use Validator;
use Auth;

class ParticipantsController extends Controller
{
    /**
     * Home Page Controller
     *
     * @return Response
     */
    public function create()
    {
      $groups = Group::all();
      return view('participants.add', compact('groups'));
    }
    public function store(){
      $validator = Validator::make(Request::all(), [
          'group_id' => 'exists:groups,id',
          'name' => 'required|max:255',
          'family' => 'required|max:255',
          'pcode' => 'required|max:255',
          'birthday' => 'required|max:10',
      ]);

      if ($validator->fails()) {
        dd($validator);
          return redirect('participants/create')
                      ->withErrors($validator)
                      ->withInput();
      }

      $participant = new Participant;
      $participant->user_id = Auth::user()->id;
      $participant->group_id = Request::get('group_id');
      $participant->name = Request::get('name');
      $participant->family = Request::get('family');
      $participant->pcode = Request::get('pcode');
      $participant->birthday = Request::get('birthday');
      $participant->save();
      return redirect()->back()->with(['message' => 'Participant Added', 'message-type' => 'green']);
    }
    public function index() {
      $participants = Participant::all();
      return view('participants.index', compact('participants'));
    }
    public function delete(){
      $id = (Request::get('delete'));
      if(!$id)
        return redirect()->back()->with(['message' => 'Please select one participant', 'message-type' => 'yellow']);
      Participant::where('id', $id)->delete();
      return redirect()->back()->with(['message' => 'Participant Deleted.']);
    }
}
