<?php
use Illuminate\Support\Facades\DB;
class EventsTableSeeder extends Seeder {
	public function run() {
		DB::table('events')->delete();

		$events = array(
			array(
				"id" => "1",
       "name" => "Winter",
       "city" => "Dublin",
       "venue" => "RDS",
       "capacity" =>"20000",
       "date" => "2016-12-21",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45"

				),
			array(
				"id" => "2",
       "name" => "Spring",
       "city" => "London",
       "venue" => "Wembley",
       "capacity" => "60000",
       "date" => "2016-03-27",
       "created_at" => "2016-01-21 14:15:23",
       "updated_at" => "2016-01-21 14:15:23"

				),
			array(
				"id" => "3",
       "name" => "Autumn",
       "city" => "Berlin",
       "venue" => "HitlersGaff",
       "capacity" => "50000",
       "date" => "2016-08-25",
       "created_at" => "2016-01-21 14:16:58",
       "updated_at" => "2016-01-21 14:16:58"
				),
			array(
				"id" => "4",
       "name" => "Summer",
       "city" => "Amsterdam",
       "venue" => "HotBox",
       "capacity" =>"45000",
       "date" => "2016-05-04",
       "created_at" => "2016-01-21 14:17:48",
       "updated_at" => "2016-01-21 14:17:48"

				)
			);
		DB::table('events')->insert($events);
	}
}