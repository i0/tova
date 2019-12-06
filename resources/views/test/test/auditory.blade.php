@extends('_layouts.default')
@section('content')
  <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
  <div class="item-title">
    {{$participant->name . ' ' . $participant->family}}
  </div>
  <div id="test">
    <div class="symbol" v-html="fakeSymbol">
    </div>
    <div id="sounds" style="display: none">

    </div>
  </div>
  <div style="text-align: center;font-size: 16px;color: #3a3a3a;">
    Touch the screen to answer
    <p>{{ trans('test.response_using_space') }}</p>
  </div>
@stop
@section('script')
<script>
test = new Vue({
  el: "#test",
  data: {
    fakeSymbol: '',
    symbol: '',
    startTime: 0,
    partLength: 150,
    capture: 0,
    result: {
      participant_id: '{{ $participant->id }}',
      numberOfParts: "{{Request::get('number-of-parts')}}",
      type: 2,
      correct: 0,
      commissionError: 0,
      omissionError: 0,
      dt: "{{Request::get('dt')}}",
      isi: "{{Request::get('isi')}}",
      testPercentage: "{{Request::get('test-percentage')}}",
      targetVariable: "{{Request::get('target-variable')}}",
      testVariableType: "{{Request::get('test-variable-type')}}",
      totalTestTime: "{{Request::get('totalTestTime')}}",
      rt: false,
    },
    testVariableType: "{{Request::get('test-variable-type')}}",
    targetVariable: "{{Request::get('target-variable')}}",
    targetVariablesArray: {
      Alphabet: {!! json_encode(trans('variables.alphabet')) !!},
      Numbers: {!! json_encode(trans('variables.numbers')) !!},
      Animals: ['Cat','Cockerel','Cow','Dog','Goat','Chicken','Horse','Nightingale','Lion'],
    },
    variableSounds: {
      Alphabet: {!! json_encode(trans('variables.alphabet_sounds')) !!},
      Numbers: {!! json_encode(trans('variables.numbers_sounds')) !!},
      Animals: [
        '{{ URL::to("/") }}/sounds/Animals/Cat.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Cockerel.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Cow.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Dog.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Goat.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Chicken.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Horse.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Nightingale.mp3',
        '{{ URL::to("/") }}/sounds/Animals/Lion.mp3',
      ],
    },
    dt: "{{Request::get('dt')}}",
    isi: "{{Request::get('isi')}}",
    testPercentage: "{{Request::get('test-percentage')}}",
    numberOfParts: "{{Request::get('number-of-parts')}}",
  },
  computed: {
    total: function(){
      return test.numberOfParts*test.partLength;
    },
    targetVariables: function(){
      return (eval('test.targetVariablesArray.' + test.testVariableType));
    },
    testArray: function(){
      var arr = [];
      var arr2 = _.remove(test.targetVariables, function(n) {
        return n != test.targetVariable;
      });
      var count = Math.round((test.testPercentage/100)*test.total);
      var res = _.fill(Array(count), test.targetVariable);
      for (step = 0; step < test.total-count; step++) {
        var item = arr2[Math.floor(Math.random()*arr2.length)];
        res.push(item);
      }
      var r = _.shuffle(_.shuffle(res));
      return r;
    }
  },
  methods: {
    show: function(){
      var item = test.testArray.pop();
      if(!item) {
        test.end();
        return false;
      }
      test.symbol = item;
      test.fakeSymbol = '♪';
      document.getElementById("audio_" + test.symbol).play();
      test.capture = 1;
      test.startTime = window.performance.now();
      setTimeout(function(){
        test.hide();
      }, test.dt);
    },
    hide: function(){
      if(test.capture == 1 && test.symbol == test.targetVariable) {
        test.result.omissionError++;
      }
      test.capture = 0;
      document.getElementById("audio_" + test.symbol).pause();
      document.getElementById("audio_" + test.symbol).currentTime = 0;
      test.symbol = '';
      test.fakeSymbol = '';
      setTimeout(function(){
        test.show();
      }, test.isi);
    },
    end: function(){
      test.capture = 0;
      test.result.stimulusPresented = test.partLength;
      var location = '{{ action("TestController@result") }}?' + $.param(test.result);
      window.location = (location);
    },
    initSounds: function(){
      for ( key in test.targetVariables ){
        var mp3 = test.variableSounds[test.testVariableType][key];
        // (auditory.variableSounds[auditory.testVariableType][auditory.targetVariables.indexOf(auditory.targetVariable)]);
        var sound      = document.createElement('audio');
        sound.id       = 'audio_' + test.targetVariables[key];
        sound.controls = 'controls';
        sound.src      = mp3;
        sound.type     = 'audio/mp3';
        document.getElementById('sounds').appendChild(sound);
      }
    },
    init: function(){
      test.initSounds();
      setTimeout(function(){
        test.show();
      }, 500);
      window.addEventListener('keypress', function(e){
          if(e.keyCode == 32 && test.capture) {
            var rt = Math.round(window.performance.now()-test.startTime);
            if(test.result.rt == 0) {
              test.result.rt = rt;
            } else {
              test.result.rt = Math.round((test.result.rt+rt)/2);
            }
            test.capture = 0;
            if(test.symbol == test.targetVariable) {
              test.result.correct++;
            } else {
              test.result.commissionError++;
            }
          }
      });
      document.querySelector('body').addEventListener('click', function(e) {
        if(test.capture) {
          var rt = Math.round(window.performance.now()-test.startTime);
          if(test.result.rt == 0) {
            test.result.rt = rt;
          } else {
            test.result.rt = Math.round((test.result.rt+rt)/2);
          }
          test.capture = 0;
          if(test.symbol == test.targetVariable) {
            test.result.correct++;
          } else {
            test.result.commissionError++;
          }
        }
      });
    },
    timer: function(time){
      test.fakeSymbol = "<div style='font-size: 28px;font-weight: bold;line-height: 1.5;margin-top: -42px !important;'>{{ trans('test.get_ready') }}<br /><span style='font-size: 50px'>"+time+"</span></div><div></div>";
      if(time < 0) {
        test.fakeSymbol = "";
        setTimeout(function(){
          test.init();
        }, 500);
      } else {
        setTimeout(function(){
          test.timer(time-1);
        }, 1000);
      }
    }
  }
});
test.timer(3);
</script>
@stop
