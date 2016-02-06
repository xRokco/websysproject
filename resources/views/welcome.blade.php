@extends('layouts.app')


@section('content')
        
        <!-- Manage Your Events -->
        <div class="section no-pad-bot" id="index-banner">
            <br><br>
            <h1 class="header center teal-text">Manage your Events</h1>
            <br><br>
            <div class="row center">
                <h5 class="header col s12 light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris facilisis dui elit, non malesuada sem luctus vel. Vestibulum in magna nec velit malesuada vestibulum sed ut justo. Nam eget velit tortor.</h5>
            </div>
            <br><br>
            <div class="row center">
                <a class="btn-large" href="#">Sign Up</a>
                <a class="btn-large grey lighten-4 black-text" href="#learn">Learn More</a>
            </div>
            <br>
            <div class="divider"></div>
        </div>

        <!-- Icon Section -->
        <div class="section">
            <div class="row">
                
                <!-- Find Events -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center teal-text"><i class="material-icons">search</i></h2>
                        <h5 class="center">Find Events</h5>
                        <p class="light">Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.</p>
                    </div>
                </div>

                <!-- List your Event -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center teal-text"><i class="material-icons">list</i></h2>
                        <h5 class="center">List your Event</h5>
                        <p class="light">Etiam non aliquet lacus, quis efficitur quam. Nam placerat odio ut orci auctor, ullamcorper pharetra arcu varius.</p>
                    </div>
                </div>

                <!-- Keep your Event Updated -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center teal-text"><i class="material-icons">announcement</i></h2>
                        <h5 class="center">Keep your Event updated</h5>
                        <p class="light">Maecenas vel purus a orci imperdiet rutrum. Ut non mattis dolor, non ultricies tortor. Morbi volutpat consequat hendrerit.</p>
                    </div>
                </div>
            </div>

            <!-- Browse Events Button -->
            <div class="row center">
                <a class="btn-large" href="/events">Browse Events</a>
            </div>
        </div>
    </div>
    <br><br>

    <!-- Footer ( footer.html ) -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </div>
@endsection
