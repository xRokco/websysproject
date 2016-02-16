WebSysProject
===============
To get this up and running you need to do a few things. 

PHP and MYSQL
-------------

* Assuming Ubuntu - instal MySQL server:
  * ```sudo apt-get install mysql-server```
  * And choose a password for the root user as it installs.

* Install php:
  * ```sudo apt-get install php5-common libapache2-mod-php5 php5-cli```

* Run this - fixes some error I kept getting:
  * ```sudo apt-get -y install php5-mysql```

* Make a database in mysql -
  * login to mysql from terminal
    * ```mysql -u root -pWHATEVERPASSWORDYOUCHOSE```
  * Once in mysql run this:
    * ```CREATE DATABASE websysproject;```
      * (dont forget the semicolon)

Composer
----------

* Go to https://getcomposer.org/ and run the command they give you
* Run this after composer has downloaded:
  * `sudo mv composer.phar /usr/local/bin/composer`

* Edit your linux PATH. 
  * To do this edit .bashrc in your home directory and add these two lines
    * `PATH=~/.composer/vendor/bin:$PATH`
    * `export PATH`
  * Save the .bashrc file and restart your terminal window.

Laravel
--------
* Run this: 
    * `composer global require "laravel/installer"`

* Clone this repo with:
    * `git clone https://github.com/xRokco/websysproject.git`
    * This will create the websysproject folder in your home directory (assuming you ran the clone from your home directory.

* now create a file in the websysproject folder called .env
  * Copy the contents of .env.example which is in the websysproject folder into .env and edit these lines:
    * DB_DATABASE=websysproject  //your database name, created as websysproject up above
    * DB_USERNAME=root          //database username, root will do here
    * DB_PASSWORD=WHATEVERPASSWORDYOUCHOSE //password chose when you installed mysql
    * MAPS_API=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg //our API keys, don't share.
    * STRIPE_PRI=sk_test_B0nWhDWzkxkF3oX6ZL9rZIEy
    * STRIPE_PUB=pk_test_qqbGUEke0JuODLnXOpEHbF7z
  * Save and close .env

* Next `cd` into the websysproject folder and run:
  * `php artisan migrate`
  * This creates the database tables we need from the various migration files.

* Next run this:
  * `php artisan key:generate`
  * This generates a key for your project.

* Project should be read to go now. Run this to start it up:
  * `php artisan serve`

* Now you can go to http://localhost:8000 in your web browser to test and develope on your web app.
