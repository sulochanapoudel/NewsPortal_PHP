<?php

define("BASEDIR", __DIR__);
require BASEDIR."/vendor/autoload.php";
$user = new \App\Models\User(1);

dump($user);
