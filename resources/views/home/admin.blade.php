<div class="item">
  <div class="item-icon">
    <i class="ion-ios-people"></i>
  </div>
  <div class="item-title">
    {{ trans('home.users') }}
  </div>
  <a href="{{action('UsersController@index')}}" class="ui button teal labled icon">
    <i class="ion-ios-people"></i>
    {{ trans('home.manage-users') }}
  </a>
</div>
<div class="ui divider"></div>
