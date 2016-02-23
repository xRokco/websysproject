@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container">
      <br><br>
      <h2 class="header center red-text">Please login</h2>
      <br><br>
</div>

<div class="container">
    <div class="row">
        <div class="col s6 offset-s3">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>E-Mail Address</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>Password</label>
                    <input type="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="hide-on-small-only">
                    <button type="submit" class="btn red darken-3">Login</button>
                    <a class="btn red darken-3" href="{{ url('/password/reset') }}">Forgot password?</a>
                </div>
                <div class="btn-container hide-on-med-and-up">
                    <div class="col m4 s12" style="margin-right:auto">
                        <button type="submit" style="width:100%;margin-bottom:5px;" class="btn red darken-3">Login</button>
                        <a class="btn red darken-3" href="{{ url('/password/reset') }}">Forgot password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
