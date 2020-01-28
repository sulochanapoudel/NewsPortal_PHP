<?php


namespace App\Models;


use System\Core\BaseModel;

class Article extends BaseModel
{
    protected $table = 'articles';

    public function user()
    {
        return $this->related(User::class,'user_id','parent');
    }

}