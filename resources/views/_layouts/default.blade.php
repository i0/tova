<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>TOVA</title>
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/dist/basscss/basscss.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/dist/basscss/colors.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/dist/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/dist/semantic-ui/semantic-ui.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') . elixir('/css/app.css')}}">
  @if(trans('settings.rtl') == true)
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') . elixir('/css/rtl.css')}}">
  @endif
  @yield('style')
</head>
<body>

<div id="app">
  @include('_partials.loading')
  <div class="ui masthead centered">
    <div class="ui page grid">
      <div class="content">
          <header>
            <div class="navbar">
              <div class="ui secondary menu">
                @if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['REQUEST_URI'] != '/')
                <a href="{{$_SERVER['HTTP_REFERER']}}" class="item" data-tooltip="{{ trans('menu.back') }}" data-inverted="" data-position="bottom center">
                  <i class="icon arrow left"></i>
                </a>
                @endif
                <div class="{{ trans('settings.rtl') == true ? 'right' : 'left' }} menu">
                  @auth
                  <div style="color: rgba(255, 255, 255, 0.65); font-size: 16px; " class="pt1">
                    <span>{{ trans('home.welcome', ['user' => Auth::user()->name]) }}</span>
                    <a href="{{route('logout')}}" data-tooltip="{{ trans('auth.logout') }}" data-inverted="" data-position="bottom center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="icon ion-android-exit"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                  @endauth
                </div>
                <div class="{{ trans('settings.rtl') == true ? 'left' : 'right' }} menu">
                  <a href="{{action('HomeController@index')}}" class="item"  data-inverted="" data-tooltip="{{ trans('menu.home') }}" data-position="bottom center">
                    <i class="icon home"></i>
                  </a>
                  @auth
                  <a href="{{action('GroupsController@index')}}" class="item" data-tooltip="{{ trans('menu.groups') }}" data-inverted="" data-position="bottom center">
                    <i class="icon ion-person-stalker"></i>
                  </a>
                  <a href="{{action('ParticipantsController@index')}}" class="item" data-tooltip="{{ trans('menu.participants') }}" data-inverted="" data-position="bottom center">
                    <i class="icon ion-person"></i>
                  </a>
                  @endauth
                  <a href="{{action('PagesController@aboutUs')}}" class="item" data-tooltip="{{ trans('menu.about_us') }}" data-inverted="" data-position="bottom center">
                    <i class="icon ion-information-circled"></i>
                  </a>
                  <a href="{{action('PagesController@help')}}" class="item" data-tooltip="{{ trans('menu.help') }}" data-inverted="" data-position="bottom center">
                    <i class="icon ion-help-circled"></i>
                  </a>
                  @auth
                    <a class="item" href="{{route('billing')}}" data-tooltip="{{ trans('menu.plans') }}" data-inverted="" data-position="bottom center">
                      <i class="icon ion-bag"></i>
                    </a>
                    @endauth
                  <div class="ui dropdown item langs">
                    {{ trans('settings.lang') }} <i class="dropdown icon"></i>
                    <div class="menu">
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="item" hreflang="{{$localeCode}}" rel="alternate" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
                      @endforeach
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </header>
          @if(!isset($no_copyright))
          <div class="" style="text-align: center;">
            <img src="{{URL::to('/')}}/images/logo.png" alt="" width="120">
          </div>
          @endif
          @include('_partials.messages')
          <div class="column">
            @yield('content')
          </div>
          @if(!isset($no_copyright))
          <div class="column copyright">
            {!! trans('home.copyright') !!}
          </div>
          @endif
      </div>
    </div>
  </div>
</div>
<script src="{{ URL::to('/') }}/js/app.js"></script>
<script type="text/javascript">
  $("header .dropdown").dropdown();
</script>
@yield('script')
</body>
</html>
