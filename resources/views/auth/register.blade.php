@extends('layouts.app')

@section('title', 'Register')

@section('content')

<style type="text/css">
    input[type="checkbox"]:checked+label:before{
     border-bottom: 2px solid #c62828;
     border-right: 2px solid #c62828;
}
</style>

<div class="container">
    <br><br>
    <h2 class="header center red-text">Please Register</h2>
    <br><br>
</div>

<div class="container">
    <div class="row">
        <div class="col m6 offset-m3 s12">
            @if (count($errors) > 0)
                <div class="alert alert-danger center red-text">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <div>
                    <label>First Name</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>

                <div>
                    <label>Surname</label>
                    <input type="text" name="surname" value="{{ old('surname') }}">
                </div>

                <div>
                    <label>E-Mail Address</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div>

                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation">
                </div>

                <div>
                    <label>What city or town will you be travelling from?</label>
                    <input type="text" name="direction" value="{{ old('direction') }}">
                </div>
                <div>
                    <input type="checkbox" name="TandC" id="TandC" />
                    <label for="TandC">I agree to the <a target="_blank" href="{{ url('/disclaimer') }}">Terms and Conditions</a></label>
                </div>
                <br/>
                <button type="submit" class="btn red darken-3 btn-primary">
                        Register<i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
