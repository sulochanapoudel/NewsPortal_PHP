<?php


namespace App\Controllers;


use App\Models\Article;
use App\Models\comment;
use System\Core\BaseController;
use System\Exceptions\FileNotFoundException;

class ArticleController extends BaseController
{

    public function __call($name, $arguments = [])
    {
        $this->show($name);

    }

    public function index()
    {

    }

    private function show($slug)
    {
        $article = (new Article)->where('slug', $slug)
            ->where('status', 'Published')
            ->where('published_at', date('Y-m-d H:i:s'), '<=')
            ->first();


        if (is_null($article)) {
            throw new FileNotFoundException('Article not found.');
        }

        $comments = $article->comments()->get();
        view('front/article/show.php', compact('article', 'comments'));
    }

    public function comment($id)
    {
        $article = new Article;
        $article->load($id);

        extract($_POST);

        $comment = new Comment;
        $comment->name = $name;
        $comment->email =  $email;
        $comment->content = $content;
        $comment->article_id = $article->id;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->save();

        set_message('Thank you for your comment', 'success');


        redirect(url("article/{$article->slug}"));




}

}