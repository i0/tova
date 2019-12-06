@if (Session::has('message'))
   <div class="ui message {{Session::has('message-type') ? Session::get('message-type') : 'positive'}}">
     <i class="close icon"></i>
     {!! Session::get('message') !!}
   </div>
@endif
