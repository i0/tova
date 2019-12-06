<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Result;
use App\Models\Participant;
use Session;
use Auth;

class TestController extends Controller
{
  public function step1(){
    $groups = Group::all();
    if(!$groups->count()) {
      Session::flash('message', 'You need to add a group first');
      Session::flash('message-type', 'info');
      return redirect(action('GroupsController@create'));
    }
    if(!Participant::count()) {
      Session::flash('message', 'You need to add a participant first');
      Session::flash('message-type', 'info');
      return redirect(action('ParticipantsController@create'));
    }
    return view('test.step1', compact('groups'));
  }
  public function group($id){
    $participants = Participant::where('group_id', $id)->get();
    return response($participants);
  }
  public function step2(){
    $participant_id = \Request::get('participant_id');
    $participant = Participant::find($participant_id);
    return view('test.step2', compact('participant'));
  }
  public function visual(){
    $participant_id = \Request::get('participant_id');
    $participant = Participant::find($participant_id);
    $data = \Request::all();
    $no_copyright = true;
    return view('test.test.visual', compact('data', 'participant', 'no_copyright'));
  }
  public function auditory(){
    $participant_id = \Request::get('participant_id');
    $participant = Participant::find($participant_id);
    $data = \Request::all();
    $no_copyright = true;
    return view('test.test.auditory', compact('data', 'participant', 'no_copyright'));
  }
  public function result(){
    $participant = Participant::find(\Request::get('participant_id'));
    $total_correct = \Request::get('correct');
    $stimulus_presented = \Request::get('stimulusPresented');
    $omission_error = \Request::get('omissionError');
    $commission_error = \Request::get('commissionError');
    $type = \Request::get('type');
    $rt = \Request::get('rt');
    $dt = \Request::get('dt');
    $isi = \Request::get('isi');
    $totalTestTime = \Request::get('totalTestTime');
    $testPercentage = \Request::get('testPercentage');
    $targetVariableType = \Request::get('testVariableType');
    $targetVariable = \Request::get('targetVariable');
    $number_of_parts = Result::where([
      'participant_id' => $participant->id,
      'type' => $type,
      'dt' => $dt,
      'isi' => $isi,
      'targetVariableType' => $targetVariableType,
      'targetVariable' => $targetVariable,
      ])->count()+1;
    //save result
    $result = new Result;
    $result->user_id = Auth::user()->id;
    $result->participant_id = $participant->id;
    $result->omission = $omission_error;
    $result->commission = $commission_error;
    $result->correct = $stimulus_presented - ($result->omission + $result->commission);
    $result->rt = $rt;
    $result->parts = $number_of_parts;
    $result->type = $type;
    $result->dt = $dt;
    $result->isi = $isi;
    $result->testPercentage = $testPercentage;
    $result->targetVariableType = $targetVariableType;
    $result->targetVariable = $targetVariable;
    $result->totalTestTime = $totalTestTime;
    $result->save();
    return view('test.result', compact('participant', 'result'));
  }
}
