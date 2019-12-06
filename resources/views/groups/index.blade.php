@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="ion-person-stalker"></i>
</div>
<div class="item-title">
  Groups
</div>
<div style="max-width: 400px; margin: 0 auto; padding-top: 20px;">
  <div>
    <a href="{{action('GroupsController@create')}}" class="ui button green labled icon mini">
      <i class="add icon"></i>
      Add New Group
    </a>
  </div>
  <div class="ui segment ">
    <form class="ui form" action="{{action('GroupsController@delete')}}" method="get">
      <div class="field">
        <label>Group Name</label>
        <select class="ui dropdown" name="delete">
          @foreach($groups as $group)
          <option value="{{$group->name}}">{{$group->name}}</option>
          @endforeach
        </select>
      </div>
      <button type='submit' class="ui button red labled icon" type="submit"><i class="delete icon"></i> Remove Group</button>
    </form>
  </div>
</div>

@stop
