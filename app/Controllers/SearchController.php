<?php


namespace App\Controllers;


use App\Models\Article;
use System\Core\BaseController;

class SearchController extends BaseController
{

    public function index()
    {
        extract($_GET);

        $articles = (new Article)->where("title", "%{$term}%", "LIKE")
                                  ->where("status", "Published")
                                  ->where("published_at", date('Y-m-d H:i:s'), "<=")
                                   ->orderBy("published_at", "DESC")
                                    ->get();


        view('front/search/index.php', compact('articles'));
    }

}