<?php


namespace App\Models;


use System\Core\BaseModel;

class Category extends BaseModel
{
    protected $table = 'articles';

    public function articles()
    {
        return $this->related(Article::class, 'category_id','child');
    }
}