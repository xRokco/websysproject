@extends('layouts.app')

@section('title', ' Past Event Details')
@section('content')
    <!-- Navigation ( navigation.html ) -->
    <style>
        .indicator {
            width:32% !important;
        }

        .breadcrumb::before{
            margin-top:-5px !important;
        }
    </style>
    <script type="text/javascript">
        function reload() {
            setTimeout (function() {
                document.getElementById('iframeid').height = 316;
            }, 400); }
    </script>
  
    <div class="container">
        <div class="section no-pad-bot" id="no-padding-top">
            <div class="row" style="margin-top: 1em; margin-bottom: 0">
                <div class="col m6 s12">
                    <h4 class="light red-text hide-on-small-only" style="line-height:50%;">{{ $ev->name }}</h4>
                    <h4 class="light red-text center hide-on-med-and-up" style="line-height:50%;">{{ $ev->name }}</h4>
                </div>
                <div class="col m6 s11 offset-s1 right-align" style="padding-top: 1em">
                    <a href="{{ url('/events') }}" class="light red-text breadcrumb">Events</a>
                    <a href="{{ url('/past') }}" class="light red-text breadcrumb">Past events</a>
                    <a href="#" class="red-text text-darken-1 breadcrumb">{{ $ev->name }}</a>
                </div>
            </div>
            <div class="divider"></div>

            <div class="row" id="event">
                <!-- Event Image -->
                <div class="col center m3 s6 offset-s3" style="margin-top:20px;">
                    <img class="responsive-img circle" src="{{ url('/img/event_images/') }}/{{ $ev->image }}" />
                </div>
                
                <!-- Event Description -->
                <div class="left-align col m5 s6">
                    <h5>{{ $ev->name }}</h5>
                    <p>{{ $ev->information }}</p>
                </div>
                
                <!-- Event Details -->
                <div class="col m3 s6">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $ev->date->toFormattedDateString() }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">query_builder</i>{{ $ev->date->toTimeString() }} to {{ $ev->end_time->toTimeString() }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $ev->venue}}, {{ $ev->city }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">perm_identity</i>Attendence: {{ $count }}</p>
                    <div class="btn-container">
                        <div>
                            @if($rsvp || $admin)
                             <a class="btn red darken-3" style="margin-top:5px;margin-bottom:5px" href="{{ url('/past/pastDetails/addVideo/') }}/{{ $ev->id }}">Add Video</a>
                            @endif
                            @if($admin)
                             <a class="btn red darken-3" style="margin-top:5px;margin-bottom:5px" href="{{ url('/admin/attendees/') }}/{{ $ev->id }}">Attendees </a>
                            @endif
                        </div>
                    </div>
            
                    
                </div>
            </div>

                
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s4"><a class="red-text" href="#description">Description</a></li>
                    <li class="tab col s4"><a class="red-text" href="#video" onclick="reload()" >Event Media</a></li>
                    <li class="tab col s4"><a class="red-text" href="#comments">Comments</a></li>
                    <div class="indicator red" style="z-index:1"> </div>
                  </ul>
                </div>
                <div id="description" class="col s12">
                    <br>
                    <p id="no-margin-top">
                        {{ $ev->description }}
                    </p>
                </div>

                <div id="video" class="col s12">
                    @foreach ($videos as $video)
                        <div class="row center">
                            <br/>
                            <table class="col m3 s7 offset-m1 offset-s4">
                                <tr><td>{{ $ev->name }}</td></tr>
                                <tr><td>{{ $ev->venue }}</td></tr>
                                 <tr><td>{{ $video->title }}</td></tr>
                                <tr><td>Submitted by user: {{ $video->name }}</td></tr>
                            </table>
                          <iframe id="iframeid" class="col m8 s12" height="315" src="//www.youtube.com/embed/{{ $video->link }}?showinfo=0" frameborder="0" allowfullscreen></iframe>

                            <br/>
                        </div>
                        <div class="divider"></div>
                    @endforeach
                </div>
            <div id="comments" class="col s12">        
                <br/>        
                    <!-- Ajax Setup to bottom of HTML file, because jQuery wasn't loaded yet
                    remove the 'url' option, because you have already the 'action' variant -->
                    {!! Form::open(array('method'=>'POST', 'id'=>'myform', 'action' => 'UserController@storeComment')) !!}
                    <div class="row grey lighten-4" style="margin-bottom: 0.5em; padding-top: 1em">
                        <div class="input-field col s12">
                            {!! Form::label('comment',' ') !!}
                            {{ Form::hidden('ev', $ev->id) }}
                            {!! Form::textarea('comment',null,['placeholder'=>'Add a comment...','class' => 'materialize-textarea']) !!}
                        </div>
                        {!! Form::submit('Comment',['class'=>'btn red darken-3 right', 'style'=>'margin-bottom: 1em']) !!}
                    </div>
                    {!! Form::close() !!}
                    @foreach ($comments as $comment)
                        <div class="row grey lighten-4" style="margin-bottom: 0.5em;">
                            <div class="input-field col s3" style="border-right: 5px solid white; margin-top: 0">
                                <a href="{{ url('/events/delete/') }}/{{ $comment->id }}"><i style="margin-top:15px;" class="material-icons right">delete</i></a>
                                <h5 class="light red-text text-darken-3">{{ $comment->name }}</h5>
                                <ul>
                                <li>Posted on {{ $comment->created_at }}</li>
                                </ul>
                            </div>
                            <div class="input-field col s9">
                                <p class="valign-wrapper">{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
