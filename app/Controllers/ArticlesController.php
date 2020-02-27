<?php


namespace App\Controllers;



use App\Models\Article;
use App\Models\Category;

use System\Core\BaseController;

class ArticlesController extends BaseController

{


   public function __construct()
   {
       auth(url('login'));
   }

    public function index()
    {
        $article = new Article();
        $paginate = $article->paginate();

        $articles = $paginate['data'];

        view('cms/articles/index.php',compact('articles', 'paginate'));

    }

    public function  create()
    {
       $category = new Category;
       $categories = $category->select('id, name')
                              ->where('status','active')
                              ->get();
       view('cms/articles/create.php', compact('categories'));
    }

    public function store()
    {
        extract($_POST);

        $article = new Article();
        $article->title = $title;
        $article->slug = $slug;
        $article->content = $content;
        $article->category_id = $category_id;
        $article->status = $status;
        $article->created_at = date('Y-m-d H:i:s');
        $article->updated_at = date ('Y-m-d H:i:s');

        if($status =='Draft') {
            $article->published_at = !empty($published_at) ? $published_at : null;
        }
        else {
            $article->published_at = !empty($published_at) ? $published_at : date('Y-m-d H:i:s');
        }

        if(!empty($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
            $ext = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
            $filename = "img_".microtime()."_".rand(1000, 9999).".".$ext;
            move_uploaded_file($_FILES['featured_image']['tmp_name'], "assets/images/{$filename}");

            $article->featured_image = $filename;
        }

        $article->save();

        set_message("Article added.", "success");
        redirect(url('articles'));
    }
    public function edit($id)
    {
        $article = new Article($id);

        $category = new Category();
        $categories = $category->select('id, name')->where('status', 'active')->get();

        view('cms/articles/edit.php', compact('categories','article'));
    }


    public function update($id)
    {
        $article = new Article($id);

        extract($_POST);

        $article->title = $title;
        $article->slug = $slug;
        $article->content = $content;
        $article->category_id = $category_id;
        $article->status = $status;
        $article->updated_at = date ('Y-m-d H:i:s');

        if($status =='draft') {
            $article->published_at = !empty($published_at) ? $published_at : null;
        }
        else {
            $article->published_at = !empty($published_at) ? $published_at : date('Y-m-d H:i:s');
        }

        if(!empty($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
            $ext = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
            $filename = "img_".microtime()."_".rand(1000, 9999).".".$ext;
            move_uploaded_file($_FILES['featured_image']['tmp_name'], "assets/images/{$filename}");
            unlink("assets/images/$article->featured_image)");

            $article->featured_image = $filename;
        }

        $article->save();

        set_message("Article updated.", "success");
        redirect(url('articles'));
    }


    public function destroy($id)
    {
        $article = new Article($id);
        @unlink("assets/images/{$article->featured_image}");

        $article->delete();

        set_message('Article removed.','success');
        redirect(url('articles'));
    }
}