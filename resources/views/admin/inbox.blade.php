@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="section no-pad-bot" id="index-banner">
                <br><br>
                <h1 class="header center teal-text">Inbox</h1>
                <br><br>
                <div class="divider"></div>
                <br><br>
        </div>

            @foreach ($messages as $message)
            <div class="card">
                <div class="col s12  offset-m2 l6 offset-l3">
                    <div class="grey lighten-5">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <div class=" waves-effect waves-block waves-light">
                                    <i class="large material-icons">email</i>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">{{ $message->subject }}<i class="material-icons right">expand_more</i></span>
                                    <a href="inbox/delete/{{ $message->id }}"><i class="material-icons right">delete</i></a>
                                    <p>{{ $message->name }}</p>
                                    <p>{{ $message->email }}</p>
                                    <p>{{ $message->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">expand_less</i></span>
                <p>{{ $message->message }}</p>
                </div>
            </div>
            @endforeach

         

            <br><br>
                <div class="divider"></div>
                <br><br>

        @if ($readMessages)
            @foreach ($readMessages as $readMessage)
            <div class="card">
                <div class="col s12  offset-m2 l6 offset-l3">
                    <div class="grey lighten-5">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <div class=" waves-effect waves-block waves-light">
                                    <i class="large material-icons">email</i>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">{{ $readMessage->subject }}<i class="material-icons right">expand_more</i></span>
                                    <p>{{ $readMessage->name }}</p>
                                    <p>{{ $readMessage->email }}</p>
                                    <p>{{ $readMessage->date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">expand_less</i></span>
                <p>{{ $readMessage->message }}</p>
                </div>
            </div>
            @endforeach
       

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

@endsection
