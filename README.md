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
composer global require "laravel/installer"

Clone this repo with
git clone https://github.com/xRokco/websysproject.git

This will create the websysproject folder in your home directory (assuming you ran the clone from your home directory.

now create a file in the websysproject folder called .env
Copy the contents of .env.example which is in the websysproject folder into .env and edit these lines:
DB_DATABASE=websysproject  //your database name, created as websysproject up above
DB_USERNAME=root          //database username, root will do here
DB_PASSWORD=WHATEVERPASSWORDYOUCHOSE //password chose when you installed mysql

Save and close .env

Next make sure you are in the websysproject folder and run:
php artisan migrate

This creates the db tables if the details in .env are correct.
Next run this:
php artisan key:generate

Project should be up and running now. Run this to start it up:
php artisan serve

Now you can go to http://localhost:8000 in your web browser to test and develope on your web app.
