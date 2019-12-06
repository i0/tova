@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="icon cubes" style="font-size: 1em;padding: 18px 0;"></i>
</div>
<div class="item-title">
  Group Report
</div>
<div style="margin: 0 auto; padding-top: 20px;">
  <div class="ui segment ">
    @if($participants->count())
    <div>
      <a href="{{action('ReportController@getExcel', \Request::get('group'))}}" target="_blank" class="ui button green">
        <i class="icon file excel outline"></i> Export Excel
      </a>
    </div>
      @foreach($participants as $participant)
        @if($participant->results()->count())
        <div style="padding: 10px 0; font-size: 18px"><h3>Reports for {{$participant->name . ' ' . $participant->family}} :</h3></div>
        <table class="ui table hoverable striped sortable responsive">
          <thead>
            <tr>
              <th class="positive">Correct</th>
              <th class="warning">Omission Error</th>
              <th class="negative">Commission Error</th>
              <th>Reaction Time</th>
              <th>Test Parts</th>
              <th>Test Type</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($participant->results()->get() as $result)
            <tr>
              <td class="positive">{{$result->correct}}</td>
              <td class="warning">{{$result->omission}}</td>
              <td class="negative">{{$result->commission}}</td>
              <td>{{$result->rt}}</td>
              <td>{{$result->parts}}</td>
              <td>
                <div>{{ $result->type == 1 ? trans('result.visual') : trans('result.auditory') }}</div>
                <div>{{ $result->targetVariableType }}({{ $result->targetVariable }})</div>
                <div>isi:{{ $result->isi }}, dt:{{ $result->dt }}</div>
                <div>Target Percentage: {{ $result->testPercentage }}%</div>
                <div>Total Test Time: {{ number_format($result->totalTestTime) . 's' }}</div>
              </td>
              <td>{{$result->created_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
          <div style="padding: 10px 0; font-size: 18px"><h3>There isn't any report for user "{{ $participant->name . ' ' . $participant->family}}"</h3></div>
        @endif
        <div class="ui divider"></div>
      @endforeach
    @else
    <div class="text-center">
      There is nothing to show.
    </div>
    @endif
  </div>
</div>

@stop
