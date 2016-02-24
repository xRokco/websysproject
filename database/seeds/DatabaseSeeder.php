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
         $this->call('MessagesTableSeeder');
         $this->call('RsvpTableSeeder');
         $this->call('AdminsTableSeeder');
         $this->call('VideosTableSeeder');
         factory(App\User::class, 50)->create();
         factory(App\Rsvp::class, 100)->create();
    }
}

class EventsTableSeeder extends Seeder {
	public function run() {
		DB::table('events')->delete();

	$events = array(
			array(
				"id" => "1",
       "name" => "Winter Event",
       "city" => "Dublin, Ireland",
       "venue" => "RDS",
       "price" => "99",
       "information" => "Lets make Ireland Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"0",
       "date" => "2016-12-21",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "1.jpg",
       "deleted_at" => NULL

				),
			array(
				"id" => "2",
       "name" => "Spring Event",
       "city" => "London, England",
       "venue" => "Wembley Stadium",
       "price" => "149",
       "information" => "Britain has a problem and that problem is Muslims. Find out what you can do to fix this problem at this event.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",       
       "capacity" => "60000",
       "date" => "2016-03-27",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:15:23",
       "updated_at" => "2016-01-21 14:15:23",
       "image" => "2.jpg",
       "deleted_at" => NULL
				),
			array(
				"id" => "3",
       "name" => "Autumn Event",
       "city" => "Berlin, Germany",
       "venue" => "Huxleys Neue Welt",
       "price" => "199",
       "information" => "Lets build a Giant wall, I know you are sick of walls after the Berlin wall but my wall will be better.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" => "50000",
       "date" => "2016-08-25",
       "start_time" => "11:00:00",
       "end_time" => "13:00:00",
       "created_at" => "2016-01-21 14:16:58",
       "updated_at" => "2016-01-21 14:16:58",
       "image" => "3.jpg",
       "deleted_at" => NULL
				),
			array(
				"id" => "4",
       "name" => "Summer Event",
       "city" => "Amsterdam, Netherlands",
       "venue" => "Heineken Music Hall",
       "price" => "420",
       "information" => "It’s freezing and snowing in New York – we need global warming! Find out why rising sea levels are actually good for the Netherlands.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"45000",
       "date" => "2016-05-04",
       "start_time" => "13:00:00",
       "end_time" => "15:00:00",
       "created_at" => "2016-01-21 14:17:48",
       "updated_at" => "2016-01-21 14:17:48",
       "image" => "4.jpg",
       "deleted_at" => NULL
				),
array(
        "id" => "5",
       "name" => "French Winter Event",
       "city" => "Paris, France",
       "venue" => "Stade de France",
       "price" => "199",
       "information" => "Lets make France Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"1000",
       "date" => "2016-12-21",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "5.jpg",
       "deleted_at" => NULL

        ),
array(
        "id" => "6",
       "name" => "Italian Spring Event",
       "city" => "Rome, Italy",
       "venue" => "Colosseum",
       "price" => "149",
       "information" => "Lets make Rome Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"250",
       "date" => "2016-12-21",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "6.jpg",
       "deleted_at" => NULL

        ),
array(
        "id" => "7",
       "name" => "Spanish Summer Event",
       "city" => "Barcelona, Spain",
       "venue" => "Nou Camp",
       "price" => "49",
       "information" => "Lets make Spain Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"100000",
       "date" => "2016-07-27",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "7.jpg",
       "deleted_at" => NULL

        ),
array(
        "id" => "8",
       "name" => "Greek Event",
       "city" => "Athens, Greece",
       "venue" => "Parthenon",
       "price" => "99",
       "information" => "Lets make Greece Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems.",
       "description" => "Hugh Beadle (1905–1980) served as Rhodesia's Chief Justice from 1961 to 1977. Opening a law practice in 1931, he became a member of the Southern Rhodesian Legislative Assembly for Godfrey Huggins's ruling United Party in 1939. He was Huggins's Parliamentary Private Secretary (1940–46), then a Cabinet minister until 1950, when he resigned to become a High Court judge. In 1961 he was knighted and appointed Chief Justice; three years later he joined the British Privy Council. As independence talks between Britain and Rhodesia stalled, Beadle sought a compromise. After Rhodesia's Unilateral Declaration of Independence (UDI) in 1965 he brought together Harold Wilson and Ian Smith, the prime ministers, for talks aboard HMS Tiger. Wilson afterwards castigated Beadle for not persuading Smith to settle. Beadle's recognition of Smith's post-UDI administration as legal in 1968 drew accusations from the British Prime Minister and others that he had furtively supported UDI all along, but his true motives remain the subject of speculation. He stayed in office after Rhodesia declared itself a republic in 1970, and remained a Privy Counsellor for the rest of his life.",
       "capacity" =>"500",
       "date" => "2016-01-21",
       "start_time" => "11:00:00",
       "end_time" => "14:00:00",
       "created_at" => "2016-01-21 14:06:45",
       "updated_at" => "2016-01-21 14:06:45",
       "image" => "8.jpg",
       "deleted_at" => "2016-01-22 14:06:45"

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
       "surname" => "Carrick"
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
       "surname" => "Fitzgerald"
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
       "surname" => "User"
        )
      );
    DB::table('users')->insert($users);
  }
}

class MessagesTableSeeder extends Seeder {
  public function run() {
    DB::table('messages')->delete();

  $messages = array(
      array(
       "id" => "1",
      "userid" => "2",
       "subject" => "I found a bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "2",
       "userid" => "1",
       "subject" => "I also found a bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-02 14:00:00"
        )
      );
    DB::table('messages')->insert($messages);
  }
}

class RsvpTableSeeder extends Seeder {
  public function run() {
    DB::table('rsvp')->delete();

  $rsvp = array(
      array(
       "userid" => "1",
       "eventid" => "8",
       "code" => "r4nd0mc0d3"
        ),
      array(
       "userid" => "2",
       "eventid" => "8",
       "code" => "4n07HeR0n3"
        )
      );
    DB::table('rsvp')->insert($rsvp);
  }
}

class AdminsTableSeeder extends Seeder {
  public function run() {
    DB::table('admins')->delete();

  $admins = array(
      array(
        "adminid" => "1",
       "userid" => "1",
        ),
      array(
        "adminid" => "2",
       "userid" => "2",
        )
      );
    DB::table('admins')->insert($admins);
  }
}

class VideosTableSeeder extends Seeder {
  public function run() {
    DB::table('videos')->delete();

  $videos = array(
      array(
        "id" => "1",
        "title" => "Trump at London event in Wembley",
       "userid" => "2",
       "eventid" => "2",
       "link" => "Uh_fPsFbgMQ"
        ),
      array(
        "id" => "2",
        "title" => "Trump at London event in Wembley",
       "userid" => "1",
       "eventid" => "2",
       "link" => "RfUxoOFk0HI"
        ),
      array(
        "id" => "3",
        "title" => "Trump at London event in Wembley",
       "userid" => "1",
       "eventid" => "2",
       "link" => "U_wTDUzcxCY"
        ),
      array(
        "id" => "4",
        "title" => "Trump at London event in Wembley",
       "userid" => "1",
       "eventid" => "2",
       "link" => "6YvVqF3G1vI"
        ),
      array(
        "id" => "5",
        "title" => "Trump at Berlin event in Autumn",
       "userid" => "1",
       "eventid" => "3",
       "link" => "Y9DJrA8gBwM"
        ),
      array(
        "id" => "6",
     "title" => "Trump at Berlin event in Autumn",
       "userid" => "1",
       "eventid" => "3",
       "link" => "aMyE1W59Vqo"
        ),
     array(
        "id" => "7",
         "title" => "Trump at Berlin event in Autumn",
       "userid" => "1",
       "eventid" => "3",
       "link" => "QAFYfsA28-Q"
        )
      );
    DB::table('videos')->insert($videos);
  }
}