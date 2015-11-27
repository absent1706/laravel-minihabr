<?php
return array(
  "driver" => "smtp",
  "host" => "mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "51441c98f8ea5c7bc",
  "password" => "7e9166b3548df0",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);