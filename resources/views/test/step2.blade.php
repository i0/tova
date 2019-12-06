@extends('_layouts.default')
@section('style')
<style>
.targetPreview{
  background: black;
  width: 100px;
  height: 100px;
  margin: 0 auto;
  color: white;
  font-size: 60px;
  text-align: center;
  padding: 40px 0 0 0;
  box-shadow: 0 0 9px black;
  border-radius: 6px;
}
audio {
  width: 240px;
}
</style>
@stop
@section('content')
  <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
  <div class="item-title">
    {{$participant->name . ' ' . $participant->family}}
  </div>
<div style="max-width: 800px; margin: 0 auto" class="ui segment" id="step1">
  <div class="ui top attached tabular menu">
    <a class="item active" data-tab="first"><i class="icon unhide"></i> {{ trans('test.visual_mode') }}</a>
    <a class="item" data-tab="second"><i class="icon music"></i> {{ trans('test.auditory_mode') }}</a>
  </div>
  @include('test.step2.visual')
  @include('test.step2.auditory')
</div>
@stop
@section('script')
<script>
$('.menu .item').tab();
</script>
@include('test.step2.visual-script')
@include('test.step2.auditory-script')
@stop
