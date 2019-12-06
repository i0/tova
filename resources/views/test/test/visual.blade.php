@extends('_layouts.default')
@section('content')
  <div class="item-icon">
      <i class="ion-android-send"></i>
    </div>
  <div class="item-title">
    {{$participant->name . ' ' . $participant->family}}
  </div>
  <div id="test">
    <div class="symbol">
      <span v-html="symbol"></span>
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
    symbol: '',
    startTime: 0,
    partLength: 150, // 150
    capture: 0,
    result: {
      participant_id: '{{ $participant->id }}',
      numberOfParts: "{{Request::get('number-of-parts')}}",
      type: 1,
      correct: 0,
      commissionError: 0,
      omissionError: 0,
      dt: "{{Request::get('dt')}}",
      isi: "{{Request::get('isi')}}",
      testPercentage: "{{Request::get('test-percentage')}}",
      targetVariable: "{{Request::get('target-variable')}}",
      testVariableType: "{{Request::get('test-variable-type')}}",
      rt: false,
      totalTestTime: "{{Request::get('totalTestTime')}}",
    },
    testVariableType: "{{Request::get('test-variable-type')}}",
    targetVariable: "{{Request::get('target-variable')}}",
    targetVariablesArray: {
      Alphabet: {!! json_encode(trans('variables.alphabet')) !!},
      Numbers: {!! json_encode(trans('variables.numbers')) !!},
      Shapes: ['↓', '↑', '←', '→', '△', '◯', '▢', '☆', '⏢']
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
    testArray: function(){
      var arr = [];
      var _arr = (eval('test.targetVariablesArray.' + test.testVariableType));
      var arr2 = _.remove(_arr, function(n) {
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
      test.symbol = '';
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
    init: function(){
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
      test.symbol = "<div style='font-size: 28px;font-weight: bold;padding-top: 50px'>{{ trans('test.get_ready') }}<br /><span style='font-size: 50px'>"+time+"</span></div><div></div>";
      if(time < 0) {
        test.symbol = "";
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
