@extends('layouts.app')

@section('content')

<div class="container">
      <br><br>
      <h2 class="header center red-text text-lighten-2">Please login</h2>
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
                    <button type="submit" class="btn waves-effect grey">Login</button>
                    <a class="btn waves-effect grey" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </form>
        </div>
    </div>
</div>
@endsection
