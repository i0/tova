@extends('_layouts.default')
@section('content')
<div class="">
  <a href="chrome://flags/#disable-gesture-requirement-for-media-playback">disable</a>
  <audio id="player" autoplay src="/sounds/Alphabet/B.mp3">
  </audio>
  <button id="ok" type="button" name="button">OK to beep</button>
</div>
@stop
@section('script')
<script type="text/javascript">
$("#ok").click(function() {
  player = document.getElementById('player');
  player.src = '/sounds/Alphabet/B.mp3'; // Set the real audio source
  player.pause(); // Play the empty element to get control
  player.play(); // Play the empty element to get control
  beeper = setInterval(function() { player.pause();player.play(); } ,1000);
});
</script>
@stop
