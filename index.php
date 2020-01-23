<?php

define("BASEDIR", __DIR__);
require BASEDIR."/vendor/autoload.php";
$user = new \App\Models\User();
$users = $user->get();
dump($users);