<?php
namespace App\Models;
use System\Core\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';
    public function articles()
    {
        return $this->related(Article::class,'user_id','child');
    }

}
