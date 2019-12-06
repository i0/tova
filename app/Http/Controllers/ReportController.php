<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Participant;
use Request;
use PDF;
use Excel;

class ReportController extends Controller
{
    public function getGroup(){
        $groups = Group::all();
        return view('report.group', compact('groups'));
    }
    public function postGroup(){
      $participants = Group::find(Request::get('group'))->participants()->get();
      return view('report.group-result', compact('participants'));
    }
    public function getIndividual(){
        $groups = Group::all();
        return view('report.individual', compact('groups'));
    }
    public function postIndividual(){
      $participant = Participant::find(Request::get('participant_id'));
      return view('report.individual-result', compact('participant'));
    }
    public function getPdf($participant_id){
      $participant = Participant::find($participant_id);
      // dd($participant);
      $pdf = PDF::loadView('report.pdf', compact('participant'));
      return $pdf->stream();
    }
    public function getExcel($group_id){
      $group = Group::find($group_id);
      $rows = [];
      foreach($group->participants()->get() as $key => $participant) {
        $rows[$key][trans('excel.full_name')] = $participant->name . ' ' . $participant->family;
        $rows[$key][trans('excel.pcode')] = $participant->pcode;
        $rows[$key][trans('excel.birthday')] = $participant->birthday;
        foreach($participant->results()->get() as $counter => $result) {
          $exam = $counter+1;
          $rows[$key][trans('excel.total_correct') . "($exam)"] = $result->correct;
          $rows[$key][trans('excel.omission_error') . "($exam)"] = $result->omission;
          $rows[$key][trans('excel.commission_error') . "($exam)"] = $result->commission;
          $rows[$key][trans('excel.number_of_parts') . "($exam)"] = $result->parts;
          $rows[$key][trans('excel.average_reaction_time') . "($exam)"] = $result->rt;
          $rows[$key][trans('excel.test_percentage') . "($exam)"] = $result->testPercentage . '%';
          $rows[$key][trans('excel.target_type') . "($exam)"] = "{$result->targetVariableType}({$result->targetVariable})";
          $rows[$key][trans('excel.dt') . "($exam)"] = $result->dt;
          $rows[$key][trans('excel.isi') . "($exam)"] = $result->isi;
          $rows[$key][trans('excel.totalTestTime') . "($exam)"] = number_format($result->totalTestTime) . 's';
        }
      }
      Excel::create('TOVA', function($excel) use($group, $rows) {
          $excel->sheet($group->name, function($sheet) use($rows) {
            $sheet->fromArray($rows);
          });
      })->export('xls');
    }
}
