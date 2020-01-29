<?php

define("BASEDIR", __DIR__);
require BASEDIR."/vendor/autoload.php";

$app = new \System\Core\SystemInit;
$app->start();











//$article = new \App\Models\Article(10);
//$user = new \App\Models\User(7);
//$articles = $user->articles()->get();
//dump($articles);

//$users = $article->user()->first();
//dump($users);

//dump($article->get());



//$user = New \App\Models\User(7);
//$user->related(\App\Models\Article::class,'user_id','child')->get();
//dump($user->get());




//for ($i= 1; $i <= 10; $i++){
    //$article = new \App\Models\Article;
   // $article->title = "Title {$i}";
   // $article->content = "Content {$i}";
   // $article->user_id = 7;
   // $article->save();
//}

//$user = new \App\Models\User(6);
//dump($user);
//$user->delete();
//dump($user);

// class, function and arguments are passed.