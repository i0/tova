@extends('_layouts.default')
@section('content')
  <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
  <div class="item-title">
    {{ trans('result.result') }}
  </div>
<div style="max-width: 400px; margin: 0 auto" class="ui segment" id="step1">
  <table class="ui table">
    <tr>
      <td>{{ trans('result.participant') }}</td>
      <td>{{ $participant->name . ' ' . $participant->family }}</td>
    </tr>
    <tr>
      <td class="positive">{{ trans('result.total_correct') }}</td>
      <td class="positive">{{ $result->correct }}</td>
    </tr>
    <tr>
      <td class="warning">{{ trans('result.omission_error') }}</td>
      <td class="warning">{{ $result->omission }}</td>
    </tr>
    <tr>
      <td class="negative">{{ trans('result.commission_error') }}</td>
      <td class="negative">{{ $result->commission }}</td>
    </tr>
    <tr>
      <td>{{ trans('result.average_reaction_time') }}</td>
      <td>{{ $result->rt }}</td>
    </tr>
    <tr>
      <td>{{ trans('result.number_of_parts') }}</td>
      <td>{{ $result->parts }}</td>
    </tr>
    <tr>
      <td>{{ trans('result.test_type') }}</td>
      <td>
        <div>{{ $result->type == 1 ? trans('result.visual') : trans('result.auditory') }}</div>
        <div>{{ $result->targetVariableType }}({{ $result->targetVariable }})</div>
        <div>DT: {{ $result->dt }}, ISI: {{ $result->isi }}</div>
        <div>Target Percentage: {{ $result->testPercentage }}%</div>
        <div>Total Test Time: {{ number_format($result->totalTestTime) . 's' }}</div>
      </td>
    </tr>
  </table>
</div>
@stop
@section('script')
<script>
</script>
@stop
