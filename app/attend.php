<?php
    $count = \DB::table('rsvp')->where('eventid', $ev->id)->count();
    $ev = \DB::table('events')->where('id', $ev->id)->first();

    if($count < $ev->capacity)
    {
        do {
            $code = str_random(10);
        } while (\DB::table('rsvp')->where("code", $code)->where('eventid', $ev->id)->first() instanceof Rsvp);
        
        \DB::table('rsvp')->insert(['userid' => Auth::user()->id, 'eventid' => $ev->id, 'code' => $code]);

    } else {
        echo "Event full";
    }    
?>