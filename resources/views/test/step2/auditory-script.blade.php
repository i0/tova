<script>
auditory = new Vue({
  el: '#auditory',
  data: {
    dt: 1000,
    isi: 1000,
    parts: 1,
    testVariableType: '',
    targetVariable: '',
    targetVariables: [],
    audio: '',
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
    targetVariablesArray: {
      Alphabet: {!! json_encode(trans('variables.alphabet')) !!},
      Numbers: {!! json_encode(trans('variables.numbers')) !!},
      Animals: ['Cat','Cockerel','Cow','Dog','Goat','Chicken','Horse','Nightingale','Lion'],
    }
  },
  watch: {
    testVariableType: function(val){
      auditory.targetVariables = (eval('auditory.targetVariablesArray.' + auditory.testVariableType));
      auditory.targetVariable = auditory.targetVariables[0];
    },
    targetVariable: function(val){
      auditory.audio = (auditory.variableSounds[auditory.testVariableType][auditory.targetVariables.indexOf(auditory.targetVariable)]);
      this.$refs.audio.load();
      this.$refs.audio.play();
    }
  },
  computed: {
    totalTestTime: function(){
      return ((parseInt(this.dt)+parseInt(this.isi))*parseInt(this.parts)*150)/1000;
    }
  },
  mounted: function(){

  }
});
// auditory.testVariableType = 'Alphabet'
</script>
