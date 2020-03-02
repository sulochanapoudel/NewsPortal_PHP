<?php


namespace App\Controllers;


use App\Models\Category;
use System\Core\BaseController;
use System\Exceptions\FileNotFoundException;

class CategoryController extends BaseController
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
        $category = (new Category())->where('slug',$slug)
                                    ->where('status', 'Active')
                                    ->first();

        if (is_null($category)) {
            throw new FileNotFoundException("Category not found.");
        }

        $articles = $category->articles()
                               ->where('status', 'Published')
                               ->where('published_at', date('Y-m-d H:i:s'), '<=')
                               ->orderBy('published_at', 'DESC')
                                ->get();

        view('front/category/show.php', compact('category','articles'));

    }

}