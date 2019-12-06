@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="ion-person"></i>
</div>
<div class="item-title">
  Participants
</div>
<div style="margin: 0 auto; padding-top: 20px;">
  <div>
    <a href="{{action('ParticipantsController@create')}}" class="ui button green labled icon mini">
      <i class="add icon"></i>
      Add New Participant
    </a>
  </div>
  <div class="ui segment ">
    @if($participants->count())
    <table class="ui table hoverable striped sortable responsive">
      <thead>
        <tr>
          <th>Group</th>
          <th>Name</th>
          <th>Family</th>
          <th>Participant's Code</th>
          <th>Birthday</th>
          <th>Create Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($participants as $participant)
        <tr>
          <td>{{ $participant->group->name }}</td>
          <td>{{ $participant->name }}</td>
          <td>{{ $participant->family }}</td>
          <td>{{ $participant->pcode }}</td>
          <td>{{ $participant->birthday }}</td>
          <td>{{ $participant->created_at->diffForHumans() }}</td>
          <td><a class="ui button red mini" href="{{action('ParticipantsController@delete')}}?delete={{ $participant->id }}" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="text-center">
      There is nothing to show.
    </div>
    @endif
  </div>
</div>

@stop
