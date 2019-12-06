<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LabsController extends Controller
{
    /**
     * Home Page Controller
     *
     * @return Response
     */
    public function words(){
      $filename = 'file.csv';
      $delimiter = '|';
      $file = (file($filename));
      $csv = [];
      foreach($file as $row) {
        $csv[] = str_getcsv(trim($row), '|');
      }
      return $csv;
    }
    public function index()
    {
      $csv = $this->words();
      $words = [];
      foreach($csv as $arr) {
        if(!$arr[0]) continue;
        // if($arr[0] == 'technology') dd($arr);
        $word = trim(strip_tags($arr[0]));
        $def = trim(strip_tags($arr[8]));
        $pronounce = trim(strip_tags($arr[10]));
        $key = preg_replace('/W[0-9+]D/', '', $arr[2]);
        $word = [$word, $def, $pronounce];
        foreach($word as &$val)
          $val = str_replace(["&nbsp;", '　', '- ', '&quot;', '= ', '  ', '≠ ', '2. ', '1. ', '  ', "\t"], [" ", '', ' -', '"', '=', ' ', '≠', ' 2.', '1.', ' ', ''], $val);
        $words[$key][] = $word;
      }
      ksort($words);
      // dd($words);
      $out = '';
      foreach($words as $key => $list) {
        $out .= "$key: \n";
        foreach($list as $word) {
          $out .= "\n" . implode("\t", $word) . "\n  ";
        }
        $out .= "\n\n\n\n\n";
      }
      echo ($out);
      // $words = str_replace(["&nbsp;", '　', '- '], [" ", '', ' -'], $words);
      // return $words;
    }
}
