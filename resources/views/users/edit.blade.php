@extends('_layouts.default')

@section('content')
<div class="ui middle aligned aligned grid">
    <div class="column unbordered">
        <div style="max-width: 400px; margin: 0 auto">
            <div>
                <div class="ui header center">Edit User</div>
                <div class="panel-body">
                    <form class="ui large form" method="POST" action="">
                        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Plan</label>
                            <div class="col-md-6">
                              <select class="ui dropdown" name="plan">
                                <option></option>
                                <option value="1" {{ $user->plan == '1' ? 'selected' : '' }}>Plan 1</option>
                                <option value="2" {{ $user->plan == '2' ? 'selected' : '' }}>Plan 2</option>
                                <option value="3" {{ $user->plan == '3' ? 'selected' : '' }}>Plan 3</option>
                                <option value="4" {{ $user->plan == '4' ? 'selected' : '' }}>Plan 4</option>
                                <option value="5" {{ $user->plan == '5' ? 'selected' : '' }}>Plan 5</option>
                                <option value="6" {{ $user->plan == '6' ? 'selected' : '' }}>Plan 6</option>
                                <option value="7" {{ $user->plan == '7' ? 'selected' : '' }}>Plan 7</option>
                              </select>
                            </div>
                        </div>
                        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                              <label><input type="checkbox" name="admin" value="1" classs="ui checkbox" {{ $user->admin ? 'checked' : '' }}> Admin</label>
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="ui button green">
                                    Submit
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
