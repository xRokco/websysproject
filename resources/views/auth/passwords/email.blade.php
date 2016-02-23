@extends('layouts.app')

@section('title', 'Reset password')
<!-- Main Content -->
@section('content')

<div class="container">
      <br><br>
      <h2 class="header center red-text">Please login</h2>
      <br><br>
</div>

<div class="container">
    <div class="row">
        <div class="col m6 offset-m3 s12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>E-Mail Address</label>

                            <div>
                                <input type="email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="red darken-3 btn btn-primary">
                                    <i class="material-icons left">email</i>Send Password Reset Link
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
