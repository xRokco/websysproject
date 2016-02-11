<?php
    $address_to_coordinates = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $_REQUEST['venue'] . ", " . $_REQUEST['city'] . "&sensor=true";
    $xml = simplexml_load_file($address_to_coordinates) or die("url not loading");
    $status = $xml->status;

    if ($status=="OK") {
        $Lat = $xml->result->geometry->location->lat;
        $Lon = $xml->result->geometry->location->lng;
        $LatLng = "$Lat,$Lon";
    }

    $place_id_url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $LatLng . "&radius=1500&types=lodging&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg";
    $xml2 = simplexml_load_file($place_id_url) or die("url not loading");
    $status2 = $xml2->status;

    if($status2=="OK") {

        for($i=0; $i<5; $i++) {
            $place_id = $xml2->result[$i]->place_id;

            $place_details_url = "https://maps.googleapis.com/maps/api/place/details/xml?placeid=" . $place_id . "&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg";
            $xml3 = simplexml_load_file($place_details_url) or die("url not loading");
            $status3 = $xml3->status;

            if($status3=="OK"){
                $place_name = $xml3->result->name;
                $place_website = $xml3->result->website;
                $place_rating = $xml3->result->rating;
                $place_address = $xml3->result->formatted_address;
                $place_phone = $xml3->result->formatted_phone_number;

                echo "<tr>";
                echo "<td><a href='" . $place_website . "'>" . $place_name . "</a></td>";
                echo "<td>" . $place_address . "</td>";
                echo "<td>" . $place_phone . "</td>";
                echo "<td>" . $place_rating . "</td>";
                echo "</tr>";
            }
        }
    }
?>