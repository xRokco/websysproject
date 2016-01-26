@extends('layouts.app')

@section('content')
    <!-- Navigation ( navigation.html ) -->

    <div class="container">
    
        <!-- Our Team -->
        <div class="section no-pad-bot" id="index-banner">
                <br><br>
                <h1 class="header center teal-text">Our Team</h1>
                <br><br>
                <div class="divider"></div>
                <br><br>
        </div>

        <!-- Conor -->
        <div class="card">
            <div class="col s12  offset-m2 l6 offset-l3">
                <div class="grey lighten-5">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <div class=" waves-effect waves-block waves-light">
                                <img src="person.png" alt="" class="activator circle responsive-img">
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Conor Molloy<i class="material-icons right">expand_less</i></span>
                                <p>Front End Developer</p>
                                <p>3rd year Computer Science in UCC </p>
                                <p><a href="#">conmolloy@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_more</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
        
        <!-- Darragh -->
        <div class="card">
            <div class="col s12  offset-m2 l6 offset-l3">
                <div class="grey lighten-5">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <div class=" waves-effect waves-block waves-light">
                                <img src="person.png" alt="" class="activator circle responsive-img">
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Darragh Drohan<i class="material-icons right">expand_less</i></span>
                                <p>Front End Developer</p>
                                <p>3rd year Computer Science in UCC </p>
                                <p><a href="#">darraghddrohan@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">What I Did<i class="material-icons right">expand_more</i></span>
            <p>Dindu Nuffin</p>
            </div>
        </div>
        
        <!-- Kieran -->
        <div class="card">
            <div class="col s12  offset-m2 l6 offset-l3">
                <div class="grey lighten-5">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <div class=" waves-effect waves-block waves-light">
                                <img src="person.png" alt="" class="activator circle responsive-img">
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Kieran O'Driscoll<i class="material-icons right">expand_less</i></span>
                                <p>?</p>
                                <p>3rd year Computer Science in UCC </p>
                                <p><a href="#">?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_more</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
        
        <!-- Matt -->
        <div class="card">
            <div class="col s12  offset-m2 l6 offset-l3">
                <div class="grey lighten-5">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <div class=" waves-effect waves-block waves-light">
                                <img src="person.png" alt="" class="activator circle responsive-img">
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Matt Carrick<i class="material-icons right">expand_less</i></span>
                                <p>Back End Developer</p>
                                <p>3rd year Computer Science in UCC </p>
                                <p><a href="#">mattcarrick13@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_more</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
        
        <!-- Peter -->
        <div class="card">
            <div class="col s12  offset-m2 l6 offset-l3">
                <div class="grey lighten-5">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <div class=" waves-effect waves-block waves-light">
                                <img src="person.png" alt="" class="activator circle responsive-img">
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Peter Fitzgerald<i class="material-icons right">expand_less</i></span>
                                <p>?</p>
                                <p>3rd year Computer Science in UCC </p>
                                <p><a href="#">?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_more</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>

    <!-- Footer ( footer.html ) -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

@endsection
