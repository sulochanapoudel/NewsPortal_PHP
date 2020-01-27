<?php

define("BASEDIR", __DIR__);
require BASEDIR."/vendor/autoload.php";
$article = new \App\Models\Article(9);
$article->related(\App\Models\User::class, 'user_id', 'parent');
dump($article->get());



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

