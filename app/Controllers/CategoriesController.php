<?php


namespace App\Controllers;


use App\Models\Category;
use System\Core\BaseController;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        auth(url('login'));

    }


    public function index()
    {
        $category = new Category();
        $paginate = $category->paginate();
        $categories = $paginate['data'];
        view('cms/categories/index.php',compact('categories', 'paginate'));

    }

    public function  create()
    {
        view('cms/categories/create.php');
    }

    public function store()
    {
        extract($_POST);



        $category = new Category;
        $category->name = $name;
        $category->slug = $slug;
        $category->status = $status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date ('Y-m-d H:i:s');
        $category->save();

        set_message('Category added.','success');
        redirect(url('categories'));
    }
    public function edit($id)
    {
        $category = new Category($id);

        view('cms/categories/edit.php', compact('category'));
    }
    public function update($id)
    {
        $category = new Category($id);

        extract($_POST);



        $category->name = $name;
        $category->slug = $slug;
        $category->status = $status;
        $category->updated_at = date ('Y-m-d H:i:s');
        $category->save();

        set_message('Category updated.','success');
        redirect(url('categories'));
    }

    public function destroy($id)
    {
        $category = new Category($id);
        $category->delete();

        set_message('Category removed.','success');
        redirect(url('categories'));
    }
}