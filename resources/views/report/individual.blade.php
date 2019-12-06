@extends('_layouts.default')
@section('content')
<div class="item-icon">
  <i class="icon cube" style="font-size: 1em;padding: 18px 0;"></i>
</div>
<div class="item-title">
  Participant Report
</div>
<div style="max-width: 400px; margin: 0 auto; padding-top: 20px;">
  <div class="ui segment ">
    <form class="ui form" action="{{action('ReportController@postIndividual')}}" method="post" id="report">
      <div class="field">
        <label>Group Name</label>
        <select class="ui dropdown" v-model="group">
          @foreach($groups as $key => $group)
          <option value="{{$group->id}}" >{{$group->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="field">
        <label>Participant Name</label>
        <select class="ui dropdown" name="participant_id">
            <option v-for="participant in participants" :value="participant.id">@{{participant.name + ' ' + participant.family}}</option>
        </select>
      </div>
      <button class="ui button" type="submit" disabled="disabled" :disabled="group == '' || typeof (participants[0]) == 'undefined'">Start</button>
    </form>
  </div>
</div>

@stop

@section('script')
<script>
report = new Vue({
  el: "#report",
  data: {
    group: '',
    participants: [],
  },
  watch: {
    group: _.debounce(
      function (group) {
        report.participants =  [];
        loading.show();
        axios.get('{{URL::to('/')}}/test/group/' + group)
          .then(function (response) {
            report.participants = response.data;
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
report.group = {{$groups[0]->id}};
</script>
@stop
