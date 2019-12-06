<!DOCTYPE html>
<html>
    <style media="screen">
      body {
        font-family: DejaVu Sans;
        font-size: 12px;
      }
      table.participant th {
        text-align: left;
        padding: 0 20px
      }
      table.report {
        border-collapse: collapse;
        margin: 25px 0;
      }
      table.report, table.report th, table.report td {
          border: 1px solid black;
      }
      table.report td, table.report th {
        padding: 5px;

    </style>
  <body>
    <table class="report" border="1" >
      <thead>
        <tr>
            <th colspan="8">
              <table class="participant" width="100%">
                <thead>
                  <tr>
                    <th>{{ trans('report.full_name') }}: {{ $participant->name . ' ' . $participant->family }}</th>
                    <th>{{ trans('report.pcode') }}: {{ $participant->pcode }}</th>
                  </tr>
                  <tr>
                    <th>{{ trans('report.birthday') }}: {{ $participant->birthday }}</th>
                    <th>{{ trans('report.group') }}: {{ $participant->group()->first()->name }}</th>
                  </tr>
                </thead>
              </table>
            </th>
        </tr>
        <tr>
          <th>{{ trans('report.full_name') }}</th>
          <th>{{ trans('report.pcode') }}</th>
          <th>{{ trans('report.total_correct') }}</th>
          <th>{{ trans('report.commission_error') }}</th>
          <th>{{ trans('report.omission_error') }}</th>
          <th>{{ trans('report.number_of_parts') }}</th>
          <th>{{ trans('report.average_reaction_time') }}</th>
          <th>Test Type</th>
        </tr>
      </thead>
      @if($participant->results()->count())
      <tbody>
          @foreach($participant->results()->get() as $result)
          <tr>
            <td>{{ $participant->name . ' ' . $participant->family }}</td>
            <td>{{ $participant->pcode }}</td>
            <td>{{ $result->correct }}</td>
            <td>{{ $result->commission }}</td>
            <td>{{ $result->omission }}</td>
            <td>{{ $result->parts }}</td>
            <td>{{ $result->rt }}</td>
            <td>
              <div>{{ $result->type == 1 ? trans('result.visual') : trans('result.auditory') }}</div>
              <div>{{ $result->targetVariableType }}({{ $result->targetVariable }})</div>
              <div>DT: {{ $result->dt }}, ISI: {{ $result->isi }}</div>
              <div>Target Percentage: {{ $result->testPercentage }}%</div>
              <div>Total Test Time: {{ number_format($result->totalTestTime) . 's' }}</div>
            </td>
          </tr>
          @endforeach
      </tbody>
      @endif
    </table>
  </body>
</html>
