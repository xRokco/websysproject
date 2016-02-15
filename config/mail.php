<?php
return array(
  "driver" => "smtp",
  "host" => "mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "00148c5182fb64",
  "password" => "3e68e9cec6eda6",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);