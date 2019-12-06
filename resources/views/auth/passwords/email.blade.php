@extends('_layouts.default')

@section('content')
<div class="ui middle aligned aligned grid">
    <div class="column unbordered">
        <div style="max-width: 400px; margin: 0 auto">
            <div>
                <div class="ui header">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="ui large form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <div class="ui message red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="ui button blue">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
