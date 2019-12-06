@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="icon cubes" style="font-size: 1em;padding: 18px 0;"></i>
</div>
<div class="item-title">
  Group Report
</div>
<div style="max-width: 400px; margin: 0 auto; padding-top: 20px;">
  <div class="ui segment ">
    <form class="ui form" action="{{action('ReportController@postGroup')}}" method="post">
      <div class="field">
        <label>Group Name</label>
        <select class="ui dropdown" name="group">
          @foreach($groups as $group)
          <option value="{{$group->id}}">{{$group->name}}</option>
          @endforeach
        </select>
      </div>
      <button type='submit' class="ui button blue labled icon" type="submit"><i class="print icon"></i> Report</button>
    </form>
  </div>
</div>

@stop
