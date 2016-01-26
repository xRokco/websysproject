@extends('layouts.app')

@section('content')
    <!-- Navigation ( navigation.html ) -->
    
    <div class="container">
        <div class="section no-pad-bot" id="no-padding-top">
            <div class="row valign-wrapper" id="event">
                <!-- Event Image -->
                <div class="col center s3">
                    <img class="responsive-img" src="event.png" />
                </div>
                
                <!-- Event Description -->
                <div class="left-align col s5">
                    <h5>Event Name</h5>
                    <p class="light">Organiser<p>
                    <p>Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus...</p>
                </div>
                
                <!-- Event Details -->
                <div class="col s3" id="test">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>15 - 17 July</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>Dublin, Ireland</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;99</p>
                    <a class="btn">Attend</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a href="#description">Description</a></li>
                    <li class="tab col s3"><a href="#location">location</a></li>
                    <li class="tab col s3"><a href="#uploads">Uploads</a></li>
                    <li class="tab col s3"><a href="#stuff">Test 4</a></li>
                  </ul>
                </div>
                <div id="description" class="col s12">
                    <br>
                    <h5 class="teal-text">Event Name</h5>
                    <h6 class="light">Organiser</h5>
                    <br>
                    <p id="no-margin-top">
                        Vivamus quam justo, posuere sit amet magna euismod, fermentum volutpat mauris. Pellentesque neque velit, finibus vel turpis pharetra, vulputate vehicula est. Morbi vitae tincidunt mi. Donec id lorem nunc. Ut varius erat non elit malesuada, quis rutrum ante pretium. Quisque aliquet pellentesque urna, at dictum sapien rhoncus nec. Donec ut magna vestibulum, cursus orci non, laoreet purus. Nunc sed suscipit nisl, congue aliquet nisi. Suspendisse volutpat enim eget malesuada auctor. Ut blandit mattis rutrum. Praesent facilisis ornare sem, eget sollicitudin orci consequat a. Curabitur congue porttitor laoreet. Vestibulum volutpat malesuada urna, eu laoreet orci egestas et. Etiam dictum, risus et pulvinar auctor, ligula nisl dapibus ipsum, eu efficitur sapien mi non ante. Nulla faucibus eget felis ut sagittis.
                    </p>
                    <p>
                        Vestibulum euismod tincidunt interdum. Nam sit amet aliquam ligula. Curabitur tristique nibh purus, sed iaculis nisl volutpat non. Etiam condimentum mollis felis sit amet finibus. Ut augue neque, aliquam sit amet massa nec, sodales consequat nisl. Quisque rhoncus maximus odio pulvinar tincidunt. Pellentesque suscipit ligula ipsum, id sodales justo hendrerit id. Nulla euismod elit consequat, semper mauris et, egestas libero. Cras ex justo, vulputate sollicitudin neque eu, pulvinar pulvinar arcu.
                    </p>                    
                    <p>
                        Nullam varius eros et consectetur rutrum. Sed rutrum at tellus et venenatis. Proin cursus eros sed augue convallis condimentum. Proin mollis sollicitudin tellus ut rhoncus. Nunc consectetur viverra arcu, vitae efficitur dui mattis in. Suspendisse nec maximus lectus. Suspendisse quis elit vitae turpis aliquam vehicula in sed urna. Morbi in dolor turpis.
                    </p>
                </div>
                <div id="location" class="col s12">
                    <div class="row">
                        <div class="col s6 center">
                            <br>
                            <br>
                            <img class="responsive-img" src="map.png">
                        </div>
                        <div class="col s6">
                            <br>
                            <h5 class="light teal-text left-align">Event Location</h5>
                            <p>Some place</p>
                        </div>
                    </div>
                </div>
                <div id="uploads" class="col s12">Test 3</div>
                <div id="stuff" class="col s12">Test 4</div>
            </div>
            
        </div>
    </div>

    <!-- Footer ( footer.html ) -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

@endsection
