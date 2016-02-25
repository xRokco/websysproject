@extends('layouts.app')

@section('title', 'Reset password')

@section('content')

<div class="container">
      <br><br>
      <h2 class="header center red-text">Reset Password</h2>
      <br><br>
</div>


<div class="container">
    <div class="row">
        <div class="col m6 offset-m3 s12">
            <form method="POST" action="{{ url('/password/reset') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <!--E-mail field-->
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>E-Mail Address</label>
                    <input type="email" name="email" value="{{ $email or old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <!--Password field-->
                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>Password</label>
                    <input type="password" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <!--Confirm password field-->
                <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <!--Submit button-->
                <button type="submit" class="btn btn-primary red darken-3">
                    <i class="material-icons right">send</i>Reset Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
