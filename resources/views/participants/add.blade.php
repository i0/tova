@extends('_layouts.default')
@section('content')
  <div class="item-icon">
      <i class="ion-person"></i>
    </div>
  <div class="item-title">
    Add Participant
  </div>
<div style="max-width: 400px; margin: 0 auto" class="ui segment ">
  <form class="ui form" action="{{action('ParticipantsController@store')}}" method="post">
    {{ csrf_field() }}
    <div class="field">
      <label>Group</label>
      <select class="ui dropdown" name="group_id">
        @foreach($groups as $group)
        <option value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="field">
      <label>Name</label>
      <input required autocomplete='off' type="text" name="name" placeholder="Name" autofocus>
    </div>
    <div class="field">
      <label>Family</label>
      <input required autocomplete='off' type="text" name="family" placeholder="Family">
    </div>
    <div class="field">
      <label>Participant's Code</label>
      <input required autocomplete='off' type="text" name="pcode" placeholder="Participant's Code">
    </div>
    <div class="field">
      <label>Date of Birth</label>
      <input required autocomplete='off' type="date" name="birthday" placeholder="Date of Birth">
    </div>
    <button class="ui button green labled icon" type="submit"><i class="icon add"></i> Add Participant</button>
  </form>
</div>

@stop
