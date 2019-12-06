@extends('_layouts.default')
@section('content')
  <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
  <div class="item-title">
    {{ trans('test.test') }}
  </div>
<div style="max-width: 400px; margin: 0 auto" class="ui segment" id="step1">
  <form class="ui form" action="{{action('TestController@step2')}}" method="get">
    <div class="field">
      <label>{{ trans('test.group_name') }}</label>
      <select class="ui dropdown" v-model="group">
        @foreach($groups as $key => $group)
        <option value="{{$group->id}}" >{{$group->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="field">
      <label>{{ trans('test.participant_name') }}</label>
      <select class="ui dropdown" name="participant_id">
          <option v-for="participant in participants" :value="participant.id">@{{participant.name + ' ' + participant.family}}</option>
      </select>
    </div>
    <button class="ui button" type="submit" disabled="disabled" :disabled="group == '' || typeof (participants[0]) == 'undefined'">
      {{ trans('test.start') }}
    </button>
  </form>
</div>
@stop
@section('script')
<script>
step1 = new Vue({
  el: "#step1",
  data: {
    group: '',
    participants: [],
  },
  watch: {
    group: _.debounce(
      function (group) {
        step1.participants =  [];
        loading.show();
        axios.get('{{URL::to('/')}}/test/group/' + group)
          .then(function (response) {
            step1.participants = response.data;
            loading.hide();
          })
          .catch(function (error) {
            alert('Error! Could not reach the API. ' + error);
          })
      },
      0
    )
  },
  mounted: function(){
  }
});
step1.group = {{$groups[0]->id}};
</script>
@stop
