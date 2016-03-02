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
       "description" => "One of Donald Trump’s key campaign promises thus far is that he will build a wall along the border between the US and Mexico, and somehow compel the Mexican government to pay for it.His latest wall-related enterprise, however, is in Ireland.The Republican presidential candidate is planning to build a two-mile-long wall along the County Clare shoreline of his Doonbeg Golf Resort, which he purchased in February 2014 for $20.4 million. Doonbeg, which will be renamed the Trump International Hotel and Golf Links, suffered damage from the massive waves that battered Ireland’s coast during storms in January and February of last year. On the 18-hole course, designed by Greg Norman, the 14th hole was washed away and the 5th, 9th and 18th holes were damaged. As a safe-guard against further coastal erosion, Trump’s team in Doonbeg is seeking to build an $11 million wall made up of more than 220,000 tons of boulders.Trump encountered local resistance on this issue last April, when his firm overseeing the resort’s renovation began placing rock armor along the dunes and shore to prevent further erosion. Because the coast-line is the natural habitat of Vertigo angustior (the narrow-mouthed whorl snail), an endangered species, the Clare County Council slapped him with a planning enforcement order, directing Trump to desist from any further work. This time around, Trump’s people have declared that he will not be proceeding with his promised investment of $50 million towards the resort unless the plans for the wall are approved.",
       "capacity" =>"17",
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
       "description" => "In response to recent radical Islamic terrorist attacks, Trump proposed 'a total and complete shutdown of Muslims entering the United States until our country's representatives can figure out what ... is going on.' The proposal drew wide criticism from sources both within the U.S. and abroad–including unusual sources such as foreign leaders who are seldom involved in United States presidential campaigns, and leaders of Trump's own party holding positions that are rarely at odds during the party's presidential primaries. Critics included British Prime Minister David Cameron, French Prime Minister Manuel Valls, Saudi Prince Al-Waleed bin Talal and Canadian Foreign Minister Stéphane Dion, as well as the chairman of the Republican Party Reince Priebus, Republican House Speaker Paul Ryan, and Republican Senate Majority Leader Mitch McConnell. A petition to block Trump from entry into the United Kingdom has gained over 540,000 signatures, a record for the UK Government website. Members of Trump's own party argued that a proposal banning members of a major world religion violated the party's conservative values, the Constitution's First Amendment (which grants freedom of religion), and the country's immigrant heritage. Critics pointed out that the proposal would result in the exclusion of many of the most important allies in the country's war on terror, from interpreters helping the CIA to Jordan's King Abdullah, and that it would bolster ISIL by furthering its narrative that the U.S. is pitted against the Muslim faith. The U.S. Pentagon issued a statement that 'anything that bolsters ISIL's narrative and pits the United States against the Muslim faith is certainly not only contrary to our values but contrary to our national security.' The Washington Post reported that, 'Donald Trump [was] featured in new jihadist recruitment video'.",
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
       "description" => "Republican presidential candidate Donald Trump is citing a spate of recent crimes in Germany on New Year’s to bolster one of his central campaign messages: Immigrants are bad. On New Year’s Eve, as many as 1,000 young men circled women in the German city of Cologne groping and, in one reported case, raping women. German police have said, however, that there is no clear indicator that the attackers arrived over the past year from conflicts in places like Syria, Iraq or Afghanistan. No arrests have been made so far.Trump’s implied opinion shows just how much of a tinderbox anything related to migrants has become in the aftermath of the Paris terrorist attacks in November. Those attacks, which have been linked to the Islamic State group, resulted in heightened concern in Europe and the United States that the massive, ongoing influx of asylum-seekers and migrants from the Middle East and North Africa could pose a substantial threat to the security of Western nations. Still, while other European countries began considering new immigration policies, German Chancellor Angela Merkel has been steadfast in her country’s commitment to help arriving asylum-seekers. Last week’s crime sprees could pose a political challenge to her going forward, and some German politicians have already taken somewhat drastic positions.Trump has been a leading conservative voice in the U.S. when it comes to immigration. He began his presidential campaign in June by denouncing Mexican and Central American immigrants, saying that Mexicans are rapists and criminals.",
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
       "description" => "Donald Trump has predicted 'revolutions' in Europe in a backlash against immigration and defended his remarks on Muslims, saying some were his 'best friends,' in his first campaign interview with French media. France 'isn't what it was' and the Germans no longer recognise their country, the Republican frontrunner in presidential primaries told the right wing French weekly Valeurs Actuelles in a long interview due for release on Thursday, but made prior to his victory in the New Hampshire Republican primary. The maverick billionaire candidate steered clear of mentioning the UK, instead taking a swipe at Chancellor Angela Merkel of Germany, saying she had made a 'huge mistake with the migrants' by welcoming hundreds of thousands to seek asylum in recent months. 'If we don't deal with the situation competently and firmly, then yes, it's the end of Europe,' he predicted.He also warned that if immigration could not be dealt with 'in an intelligent, rapid and energetic manner,' then Europe was headed for 'more than just upheaval, on a scale you can't even imagine.'" ,
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
       "information" => "Lets make France Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Frances problems.",
       "description" => "Had Donald J Trump been around when ISIS attacked Paris, he says he would have 'opened fire.' 'I always have a gun on me,' he reportedly told French magazine Valleurs Actuelles as he made the case for loosened regulations on firearms. France has strict gun laws and no right to bear arms for its citizens. The U.S. presidential candidate has more than once suggested the laws there be changed there and elsewhere so that victims of such attacks are able to defend themselves.After the Charlie Hebdo massacre in January of 2015, Trump tweeted, 'If the people so violently shot down in Paris had guns, at least they would have had a fighting chance.' 'Isn't it interesting that the tragedy in Paris too place in one of the toughest gun control countries in the world?' 'Remember, when guns are outlawed, only outlaws will have guns!'' he said in a third tweet.  In an interview this month that ran in Valleurs Actuelles, Trump referenced the November terrorist attack on Paris and said, 'Do you really think that if there were people in the crowd, who were armed and trained, things would have turned out the same way?''I don't think so. They would have killed the terrorists. It makes sense,' he said. The GOP front-runner for president then declared: 'I always have a gun on me. I can tell you that if I had been in the Bataclan or in the cafes I would have opened fire.'",  
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
       "information" => "Lets make Rome Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Italys problems.",
       "description" => "The lessons of Italian history ought to make Americans a lot more nervous about Donald Trump than they seem to be. Calculated buffoonery is a longstanding tactic for right-wing demagogues looking to alter national political calculations to their own advantage — masking as farce the tragedy they portend. Ask Italian voters, who spent a total of nine years between 1994 and 2011 being governed by Silvio Berlusconi. Italy’s longest-serving prime minister, Berlusconi started out as a wealthy demagogue on the brink of bankruptcy, whose celebrity was — like Trump’s — rooted in both real estate and popular entertainment culture. Berlusconi presented himself as Italy’s strongman, speaking like a barman, selling demonstrably false promises of wealth and grandeur for all. He made the electorate laugh while stoking fears of communists and liberals stripping privileges and increasing taxes. Presaging Trump, the Italian media mogul cast himself as the only viable savior of a struggling nation: the political outsider promising to sweep in and clean up from the vanquished left and restore the country to its lost international stature. Like Berlusconi, Trump is running on his claim of being a rich, successful businessman, despite the fact that he was the owner of at least four bankrupt companies — just as Berlusconi promised Italians to make them as rich as he was, while in reality his companies were deeply in debt at the time he first ran.",   
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
       "information" => "Lets make Spain Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Spains problems.",
       "description" => "United States Republican candidate Donald Trump's election campaign video in which he pledges to stop illegal immigration from México features footage of the Spain-Morocco border.The property tycoon's 30-second advert shows photos of president Barack Obama and democrat candidate Hillary Clinton, followed by the gunmen behind the San Bernardino (California) massacre in November.Famous for his anti-foreigner sentiments – having announced he would deport all 15 million of the country's undocumented migrants and build a wall across the Mexican border, publicly claiming immigrants from the more southern nation were 'thieves and rapists' – Trump's advert shows a stream of migrants trying to get through the border.But on closer inspection, it turns out that the footage is not only two years old, but is of the frontier between the Spanish-owned city-province of Melilla on the northern African coast and its nearest neighbour by land, Morocco. US television channel NBC pointed this out to campaign leader Cory Lewandowski – himself descended from immigrants – saying the Republicans were using a border between Spain and Africa to highlight the 'migration problem' between México and the United States.",    
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
       "information" => "Lets make Greece Great Again! Listen to a man who went to the Wharton School of Finance tell you how to fix all of Greeces problems.",
       "description" => "Real-estate developer and Republican presidential candidate Donald Trump thinks the US needs to stay out of Greece's problems. Greece has been making headlines lately because of its inability to make debt payments. The fear among economists, investors, and traders is that Greece's economic problems could spill into the rest of Europe and perhaps the rest of the world. Trump, however, argued Wednesday morning that Germany would take care of the embattled European country.I'd stay back a little bit; I wouldn't get too involved,' Trump said in an interview with Fox Business' Maria Bartiromo. 'Don't forget that the whole euro situation was created to compete against the United States. They put together a group of countries to beat the United States. Now Germany's very powerful, very strong. I'd let Germany handle it.' Trump added that if Germany didn't fix the Greek debt situation, Russian President Vladimir Putin would step in. 'We have enough problems,' Trump said. 'Germany will ... take care of it. Frankly, Putin probably comes in to save the day if Germany doesn't.' Trump added, 'So I think that Greece is going to be in better shape than people think.'",   
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
       "userid" => "2",
       "eventid" => "8",
       "comment" => " Sample comment..... , eu sollicitudin est fermentum eu",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "2",
       "userid" => "1",
       "eventid" => "8",
       "comment" => " Proin consequat massa nec tortor maximus, mentum eu. Curabitur . ortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "3",
       "userid" => "5",
       "eventid" => "8",
      "comment" => "Maecenas congue ligula velit, eu sollicitudin est  erat quis malesuada..",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        ),
      array(
        "id" => "4",
       "userid" => "8",
       "eventid" => "8",
      "comment" => "Here's my long bug report. ",
       "created_at" => "2016-01-01 14:00:00",
       "deleted_at" => NULL
        )
      );
    DB::table('comments')->insert($comments);
  }
}