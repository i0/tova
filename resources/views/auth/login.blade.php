@extends('_layouts.default')

@section('content')
<div class="ui middle aligned aligned grid">
    <div class="column unbordered">
        <div style="max-width: 400px; margin: 0 auto">
            <div>
                <div class="ui header">{{ trans('auth.login') }}</div>

                <div class="panel-body">
                    <form class="ui large form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('auth.email') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <div class="ui message red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('auth.remember-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="ui button blue">
                                    {{ trans('auth.login') }}
                                </button>
                                <div class="pt1">
                                    <a class="ui button green" href="{{ route('register') }}">
                                        {{ trans('auth.register') }}
                                    </a>
                                </div>
                                <div class="pt2 h5">
                                    <a href="{{ route('password.request') }}">
                                        {{ trans('auth.forgot-password') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
