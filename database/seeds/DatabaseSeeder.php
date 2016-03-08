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
         $this->call('CommentsTableSeeder');
         factory(App\User::class, 100)->create();
         factory(App\Rsvp::class, 300)->create();
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
       "description" => "One of Donald Trump’s key campaign promises thus far is that he will build a wall along the border between the US and Mexico, and somehow compel the Mexican government to pay for it.His latest wall-related enterprise, however, is in Ireland.The Republican presidential candidate is planning to build a two-mile-long wall along the County Clare shoreline of his Doonbeg Golf Resort, which he purchased in February 2014 for $20.4 million. Doonbeg, which will be renamed the Trump International Hotel and Golf Links, suffered damage from the massive waves that battered Ireland’s coast during storms in January and February of last year. On the 18-hole course, designed by Greg Norman, the 14th hole was washed away and the 5th, 9th and 18th holes were damaged. As a safe-guard against further coastal erosion, Trump’s team in Doonbeg is seeking to build an $11 million wall.",
       "capacity" =>"17",
       "date" => "2016-12-21 11:00:00",
       "end_time" => "2016-12-21 14:00:00",
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
       "description" => "In response to recent radical Islamic terrorist attacks, Trump proposed 'a total and complete shutdown of Muslims entering the United States until our country's representatives can figure out what ... is going on.' The proposal drew wide criticism from sources both within the U.S. and abroad–including unusual sources such as foreign leaders who are seldom involved in United States presidential campaigns, and leaders of Trump's own party holding positions that are rarely at odds during the party's presidential primaries. Critics included British Prime Minister David Cameron, French Prime Minister Manuel Valls, Saudi Prince Al-Waleed bin Talal and Canadian Foreign Minister Stéphane Dion, as well as the chairman of the Republican Party Reince Priebus, Republican House Speaker Paul Ryan, and Republican Senate Majority Leader Mitch McConnell. A petition to block Trump from entry into the United Kingdom has gained over 540,000 signatures.",
       "capacity" => "60000",
       "date" => "2016-03-27 11:00:00",
       "end_time" => "2016-03-27 14:00:00",
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
       "description" => "Republican presidential candidate Donald Trump is citing a spate of recent crimes in Germany on New Year’s to bolster one of his central campaign messages: Immigrants are bad. On New Year’s Eve, as many as 1,000 young men circled women in the German city of Cologne groping and, in one reported case, raping women. German police have said, however, that there is no clear indicator that the attackers arrived over the past year from conflicts in places like Syria, Iraq or Afghanistan. No arrests have been made so far.Trump’s implied opinion shows just how much of a tinderbox anything related to migrants has become in the aftermath of the Paris terrorist attacks in November. Those attacks, which have been linked to the Islamic State group, resulted in heightened concern in Europe and the United States that the massive, ongoing influx of asylum-seekers.",
       "capacity" => "50000",
       "date" => "2016-08-25 10:00:00",
       "end_time" => "2016-08-25 13:00:00",
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
       "description" => "Donald Trump has predicted 'revolutions' in Europe in a backlash against immigration and defended his remarks on Muslims, saying some were his 'best friends,' in his first campaign interview with French media. France 'isn't what it was' and the Germans no longer recognise their country, the Republican frontrunner in presidential primaries told the right wing French weekly Valeurs Actuelles in a long interview due for release on Thursday, but made prior to his victory in the New Hampshire Republican primary. The maverick billionaire candidate steered clear of mentioning the UK, instead taking a swipe at Chancellor Angela Merkel of Germany, saying she had made a 'huge mistake with the migrants' by welcoming hundreds of thousands to seek asylum in recent months. 'If we don't deal with the situation competently and firmly, then yes, it's the end of Europe,' he predicted." ,
       "capacity" =>"45000",
       "date" => "2016-06-30 10:00:00",
       "end_time" => "2016-06-30 13:00:00",
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
       "information" => "Lets make France Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Frances problems.",
       "description" => "Had Donald J Trump been around when ISIS attacked Paris, he says he would have 'opened fire.' 'I always have a gun on me,' he reportedly told French magazine Valleurs Actuelles as he made the case for loosened regulations on firearms. France has strict gun laws and no right to bear arms for its citizens. The U.S. presidential candidate has more than once suggested the laws there be changed there and elsewhere so that victims of such attacks are able to defend themselves.After the Charlie Hebdo massacre in January of 2015, Trump tweeted, 'If the people so violently shot down in Paris had guns, at least they would have had a fighting chance.' 'Isn't it interesting that the tragedy in Paris too place in one of the toughest gun control countries in the world?' 'Remember, when guns are outlawed, only outlaws will have guns!'' he said in a third tweet.  In an interview this month that ran in Valleurs Actuelles, Trump referenced the November terrorist attack on Paris.",  
       "capacity" =>"1000",
       "date" => "2016-11-19 10:00:00",
       "end_time" => "2016-11-19 13:00:00",
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
       "information" => "Lets make Rome Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Italys problems.",
       "description" => "The lessons of Italian history ought to make Americans a lot more nervous about Donald Trump than they seem to be. Calculated buffoonery is a longstanding tactic for right-wing demagogues looking to alter national political calculations to their own advantage — masking as farce the tragedy they portend. Ask Italian voters, who spent a total of nine years between 1994 and 2011 being governed by Silvio Berlusconi. Italy’s longest-serving prime minister, Berlusconi started out as a wealthy demagogue on the brink of bankruptcy, whose celebrity was — like Trump’s — rooted in both real estate and popular entertainment culture. Berlusconi presented himself as Italy’s strongman, speaking like a barman, selling demonstrably false promises of wealth and grandeur for all. He made the electorate laugh while stoking fears of communists and liberals stripping privileges and increasing taxes.",   
       "capacity" =>"250",
       "date" => "2016-04-05 10:00:00",
       "end_time" => "2016-04-05 13:00:00",
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
       "information" => "Lets make Spain Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Spains problems.",
       "description" => "United States Republican candidate Donald Trump's election campaign video in which he pledges to stop illegal immigration from México features footage of the Spain-Morocco border.The property tycoon's 30-second advert shows photos of president Barack Obama and democrat candidate Hillary Clinton, followed by the gunmen behind the San Bernardino (California) massacre in November.Famous for his anti-foreigner sentiments – having announced he would deport all 15 million of the country's undocumented migrants and build a wall across the Mexican border, publicly claiming immigrants from the more southern nation were 'thieves and rapists' – Trump's advert shows a stream of migrants trying to get through the border.",    
       "capacity" =>"100000",
       "date" => "2016-07-25 10:00:00",
       "end_time" => "2016-07-15 13:00:00",
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
       "information" => "Lets make Greece Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Greeces problems.",
       "description" => "Real-estate developer and Republican presidential candidate Donald Trump thinks the US needs to stay out of Greece's problems. Greece has been making headlines lately because of its inability to make debt payments. The fear among economists, investors, and traders is that Greece's economic problems could spill into the rest of Europe and perhaps the rest of the world. Trump, however, argued Wednesday morning that Germany would take care of the embattled European country.I'd stay back a little bit; I wouldn't get too involved,' Trump said in an interview with Fox Business' Maria Bartiromo. 'Don't forget that the whole euro situation was created to compete against the United States. They put together a group of countries to beat the United States. Now Germany's very powerful, very strong. I'd let Germany handle it.'",   
       "capacity" =>"500",
       "date" => "2016-05-25 10:00:00",
       "end_time" => "2016-05-25 13:00:00",
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
       "created_at" => "2016-01-01 15:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "2",
      "userid" => "6",
       "subject" => "Another bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-14 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "3",
      "userid" => "9",
       "subject" => "Need a refund",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-02-01 16:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "4",
      "userid" => "5",
       "subject" => "I'm lonely",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-18 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "5",
      "userid" => "2",
       "subject" => "MakeAmericaGreatAgain",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-03-11 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "6",
      "userid" => "14",
       "subject" => "Trump for prez",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-03-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "7",
      "userid" => "32",
       "subject" => "Massive security vulverability",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-11 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "8",
      "userid" => "12",
       "subject" => "How's it going guys?",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-02-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
       "id" => "9",
       "userid" => "3",
       "subject" => "What's the story?",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-02 15:00:00"
        ),
      array(
       "id" => "10",
       "userid" => "2",
       "subject" => "I didn't mean to buy this ticket",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-09 13:32:00"
        ),
      array(
       "id" => "11",
       "userid" => "1",
       "subject" => "Hot singles in your area!",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-03-02 09:00:00"
        ),
      array(
       "id" => "12",
       "userid" => "22",
       "subject" => "Bug alert",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-12 16:00:00"
        ),
      array(
       "id" => "13",
       "userid" => "43",
       "subject" => "wow there really are a lot of messages",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-11 14:00:00"
        ),
      array(
       "id" => "14",
       "userid" => "8",
       "subject" => "I also found a bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-02-12 10:00:00"
        ),
      array(
       "id" => "15",
       "userid" => "16",
       "subject" => "I also found a bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-02-02 14:08:00"
        ),
      array(
       "id" => "16",
       "userid" => "23",
       "subject" => "I also found a bug",
       "message" => "Here's my long bug report. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu. Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "updated_at" => "2016-01-01 14:00:00",
       "deleted_at" => "2016-01-02 17:04:00"
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
        "title" => "Trump at Greek event in the Parthenon",
       "userid" => "2",
       "eventid" => "8",
       "link" => "Uh_fPsFbgMQ"
        ),
      array(
        "id" => "2",
        "title" => "Trump at Greek event in the Parthenon",
       "userid" => "1",
       "eventid" => "8",
       "link" => "RfUxoOFk0HI"
        ),
      array(
        "id" => "3",
        "title" => "Trump at Greek event in the Parthenon",
       "userid" => "1",
       "eventid" => "8",
       "link" => "kmPqV41bfC0"
        ),
      array(
        "id" => "4",
        "title" => "Trump at Greek event in the Parthenon",
       "userid" => "1",
       "eventid" => "8",
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

class CommentsTableSeeder extends Seeder {
  public function run() {
    DB::table('comments')->delete();

  $comments = array(
      array(
        "id" => "1",
       "userid" => "12",
       "eventid" => "1",
       "comment" => " David Duke here, Big Fan Mr.Trump, Love your work.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "2",
       "userid" => "1",
       "eventid" => "1",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-02-01 11:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "3",
       "userid" => "5",
       "eventid" => "1",
      "comment" => "I think Trump is a big silly head whats he done nothing wheres his wall no where yeah good stuff trump real funny",
       "created_at" => "2016-02-07 16:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "4",
       "userid" => "8",
       "eventid" => "1",
      "comment" => "Feel the bernnnnnnn. ",
       "created_at" => "2016-01-28 17:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "5",
       "userid" => "7",
       "eventid" => "2",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-02-28 10:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "6",
       "userid" => "13",
       "eventid" => "3",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 10:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "7",
       "userid" => "14",
       "eventid" => "4",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "8",
       "userid" => "15",
       "eventid" => "5",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "9",
       "userid" => "16",
       "eventid" => "6",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "10",
       "userid" => "17",
       "eventid" => "7",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "11",
       "userid" => "23",
       "eventid" => "8",
       "comment" => " They took our Jobs! #MakeAmericaGreatAgain.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      );
    DB::table('comments')->insert($comments);
  }
}