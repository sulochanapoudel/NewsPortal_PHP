<?php


namespace App\Controllers;


use App\Models\Article;
use System\Core\BaseController;

class ArticlesController extends BaseController

{

    public function index()
    {
        $article = new Article();
        $paginate = $article->paginate();

        $articles = $paginate['data'];

        view('cms/articles/index.php',compact('articles', 'paginate'));

    }

    public function  create()
    {
        view('cms/articles/create.php');
    }

    public function store()
    {
        extract($_POST);

        $article = new Article();
        $article->name = $name;
        $article->slug = $slug;
        $article->content = $content;
        $article->category_id = $category_id;
        $article->status = $status;
        $article->published_at = date('Y-m-d H:i:s');
        $article->created_at = date('Y-m-d H:i:s');
        $article->updated_at = date ('Y-m-d H:i:s');
        $article->save();

        set_message('Article added.','success');
        redirect(url('articles'));
    }
    public function edit($id)
    {
        $article = new Article($id);

        view('cms/articles/edit.php', compact('article'));
    }
    public function update($id)
    {
        extract($_POST);

        $article = new Category($id);

        $article->name = $name;
        $article->slug = $slug;
        $article->status = $status;
        $article->updated_at = date ('Y-m-d H:i:s');
        $article->save();

        set_message('Article updated.','success');
        redirect(url('articles'));
    }

    public function destroy($id)
    {
        $article = new Article($id);
        $article->delete();

        set_message('Article removed.','success');
        redirect(url('articles'));
    }
}