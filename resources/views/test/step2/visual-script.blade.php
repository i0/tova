<script>
visual = new Vue({
  el: '#visual',
  data: {
    dt: 500,
    isi: 1000,
    parts: 1,
    testVariableType: '',
    targetVariable: '',
    targetVariables: [],
    targetVariablesArray: {
      Alphabet: {!! json_encode(trans('variables.alphabet')) !!},
      Numbers: {!! json_encode(trans('variables.numbers')) !!},
      Shapes: ['↓', '↑', '←', '→', '△', '◯', '▢', '☆', '⏢']
    }
  },
  watch: {
    testVariableType: function(val){
      visual.targetVariables = (eval('visual.targetVariablesArray.' + visual.testVariableType));
      visual.targetVariable = visual.targetVariables[0];
    }
  },
  computed: {
    totalTestTime: function(){
      return ((parseInt(this.dt)+parseInt(this.isi))*parseInt(this.parts)*150)/1000;
    }
  },
  mounted: function(){
// console.log(eval('visual.targetVariable.' + visual.testVariableType));
  },
});
visual.testVariableType = 'Alphabet'
</script>
