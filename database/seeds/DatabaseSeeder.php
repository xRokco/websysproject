<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
         $this->call('EventsTableSeeder');
         $this->call('UsersTableSeeder');
         

    }
}

class EventsTableSeeder extends Seeder {
	public function run() {
		DB::table('events')->delete();

	$events = array(
			array(
				"id" => "1",
       "name" => "Winter Event",
       "city" => "Dublin",
       "venue" => "RDS",
       "price" => "99",
       "information" => "Lets make Ireland Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "capacity" =>"20000",
       "date" => "2016-12-21",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "1.jpg",
       "deleted_at" => NULL

				),
			array(
				"id" => "2",
       "name" => "Spring Event",
       "city" => "London",
       "venue" => "Wembley Stadium",
       "price" => "149",
       "information" => "Britain has a problem and that problem is Muslims. Find out what you can do to fix this problem at this event.",
       "capacity" => "60000",
       "date" => "2016-03-27",
       "created_at" => "2016-01-21 14:15:23",
       "updated_at" => "2016-01-21 14:15:23",
       "image" => "2.jpg",
       "deleted_at" => NULL
				),
			array(
				"id" => "3",
       "name" => "Autumn Event",
       "city" => "Berlin",
       "venue" => "Huxleys Neue Welt",
       "price" => "199",
       "information" => "Lets build a Giant wall, I know you are sick of walls after the Berlin wall but my wall will be better.",
       "capacity" => "50000",
       "date" => "2016-08-25",
       "created_at" => "2016-01-21 14:16:58",
       "updated_at" => "2016-01-21 14:16:58",
       "image" => "3.jpg",
       "deleted_at" => NULL
				),
			array(
				"id" => "4",
       "name" => "Summer Event",
       "city" => "Amsterdam",
       "venue" => "Heineken Music Hall",
       "price" => "420",
       "information" => "It’s freezing and snowing in New York – we need global warming! Find out why rising sea levels are actually good for the Netherlands.",
       "capacity" =>"45000",
       "date" => "2016-05-04",
       "created_at" => "2016-01-21 14:17:48",
       "updated_at" => "2016-01-21 14:17:48",
       "image" => "4.jpg",
       "deleted_at" => NULL
				)
			);
		DB::table('events')->insert($events);
	}
}

class UsersTableSeeder extends Seeder {
  public function run() {
    DB::table('users')->delete();

  $users = array(
      array(
       "id" => "1",
       "name" => "Matt",
       "email" => "matt@rokco.org",
       "password" => bcrypt('secret'),
       "remember_token" => "r4p9i7hRC0i8uVvMSoSZ0qALdbCZolkZHOggIGTGJ7ZExEFF6WCckdIVbYNw",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "direction" => "13 Garranmore, Dunmore Road, Waterford",
       "surname" => "Carrick",
       "admin" => 1
        ),
      array(
       "id" => "2",
       "name" => "Peter",
       "email" => "peter@rokco.org",
       "password" => bcrypt('secret'),
       "remember_token" => "r4p9i7hRC0i8uVvMSoSZ0qALdbCZolkZHOggIGTGJ7ZExEFF6WCckdIVbYNw",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "direction" => "4 Salvador Place, Western Road, Cork",
       "surname" => "Fitzgerald",
       "admin" => 1
        ),
      array(
       "id" => "3",
       "name" => "NonAdmin",
       "email" => "reg@rokco.org",
       "password" => bcrypt('secret'),
       "remember_token" => "r4p9i7hRC0i8uVvMSoSZ0qALdbCZolkZHOggIGTGJ7ZExEFF6WCckdIVbYNw",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "direction" => "Belfast",
       "surname" => "User",
       "admin" => 0
        )
      );
    DB::table('users')->insert($users);
  }
}
