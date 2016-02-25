<?php
return array(
  "driver" => "smtp",
  "host" => "smtp.sendgrid.net",
  "port" => 587,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "encrtyption" => "tls",
  "username" => env("MAIL_USERNAME"),
  "password" => env("MAIL_PASSWORD"),
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);