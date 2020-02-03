<?php


namespace App\Models;


use System\Core\BaseModel;

class Article extends BaseModel
{
    protected $table = 'articles';
    public function category ()
    {
        return $this->related(Category::class,'category_id','parent');
    }
    public function comments()
    {
        return $this->related(Comment::class, 'article_id', 'child');
    }

}