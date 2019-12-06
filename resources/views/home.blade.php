@extends('_layouts.default')
@section('content')
@if(!Auth::user()->isAdmin())
  @if(Auth::user()->plan)
  <div class="ui message blue">
    <i class="close icon"></i>
    <div class="center">
      <i class="ion-checkmark-round"></i>
      @if(Auth::user()->plan == 7)
      You have life-time access
      @else
      Your have full access until  {{ Auth::user()->trial_ends_at }} ({{ Auth::user()->trial_ends_at->diffForHumans(null, false) }})
      @endif
    </div>
  </div>
  @else
    @if(Auth::user()->onTrial())
    <div class="ui message yellow">
      <i class="close icon"></i>
      <div class="center">
        <i class="ion-alert-circled"></i>
        {!! trans('home.trial-message', ['link' => route('billing'), 'expire' => Auth::user()->trial_ends_at->diffForHumans(null, false)]) !!}
      </div>
    </div>
    @endif
  @endif
@endif
<div class="main-menu">
  @if(Auth::user()->isAdmin())
    @include('home.admin')
  @endif
  <div class="item">
    <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
    <div class="item-title">
      {{ trans('home.test') }}
    </div>
    <a href="{{action('TestController@step1')}}" class="ui button blue labled icon">
      <i class="ion-android-send"></i>
      {{ trans('home.start_test') }}
    </a>
  </div>
  <div class="ui divider"></div>
  <div class="item">
    <div class="item-icon">
      <i class="ion-person-stalker"></i>
    </div>
    <div class="item-title">
      {{ trans('home.groups') }}
    </div>
    <a href="{{action('GroupsController@create')}}" class="ui button green labled icon">
      <i class="add icon"></i>
      {{ trans('home.add') }}
    </a>
    <a href="{{action('GroupsController@index')}}" class="ui button teal labled icon">
      <i class="list icon"></i>
      {{ trans('home.list') }}
    </a>
  </div>

  <div class="item">
    <div class="item-icon">
      <i class="ion-person"></i>
    </div>
    <div class="item-title">
      {{ trans('home.participants') }}
    </div>
    <a href="{{action('ParticipantsController@create')}}" class="ui button green labled icon">
      <i class="add icon"></i>
      {{ trans('home.add') }}
    </a>
    <a href="{{action('ParticipantsController@index')}}" class="ui button teal labled icon">
      <i class="list icon"></i>
      {{ trans('home.list') }}
    </a>
  </div>
  <div class="ui divider"></div>
  <div class="item">
    <div class="item-icon">
      <i class="ion-printer"></i>
    </div>
    <div class="item-title">
      {{ trans('home.report') }}
    </div>
    <a href="{{action('ReportController@getGroup')}}" class="ui button orange labled icon">
      <i class="icon cubes"></i>
      {{ trans('home.group') }}
    </a>
    <a href="{{action('ReportController@getIndividual')}}" class="ui button violet labled icon">
      <i class="icon cube"></i>
      {{ trans('home.individual') }}
    </a>
  </div>
  <div class="ui divider"></div>

</div>
@stop
@section('script')
<script type="text/javascript">
  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
  })
</script>
@stop
