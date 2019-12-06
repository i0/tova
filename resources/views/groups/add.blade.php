@extends('_layouts.default')
@section('content')
<div class="page-icon">
  <div class="item-icon">
      <i class="ion-person-stalker"></i>
    </div>
  <div class="item-title">
    Add Group
  </div>
</div>
<div style="max-width: 400px; margin: 0 auto" class="ui segment green">
  <form class="ui form" action="{{action('GroupsController@store')}}" method="post">
    {{ csrf_field() }}
    <div class="field">
      <label>Group Name</label>
      <input required autocomplete='off' type="text" name="name" placeholder="Group Name" autofocus>
    </div>
    <button class="ui button green labled icon" type="submit"><i class="add icon"></i> Add Group</button>
  </form>
</div>

@stop
