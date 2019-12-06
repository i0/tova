@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="ion-person"></i>
</div>
<div class="item-title">
  Users
</div>
<div style="margin: 0 auto; padding-top: 20px;">
  <!-- <div>
    <a href="{{action('ParticipantsController@create')}}" class="ui button green labled icon mini">
      <i class="add icon"></i>
      Add New User
    </a> -->
  <!-- </div> -->
  <div class="ui segment ">
    @if($users->count())
    <table class="ui table hoverable striped sortable responsive">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Subscribed Plan</th>
          <th>Admin</th>
          <th>Expire Date</th>
          <th>Create Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->plan }}</td>
          <td class="center">{!! $user->isAdmin() ? '<i class="ui text green">✓</i>' : '<i class="ui text red">×</i>' !!}</td>
          @if($user->plan == 7)
          <td>Life-time</td>
          @else
          <td>{!! $user->trial_ends_at->diffForHumans(null, false) !!}</td>
          @endif
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td><a class="ui button teal mini" href="{{action('UsersController@edit', $user->id)}}">Edit</a></td>
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
