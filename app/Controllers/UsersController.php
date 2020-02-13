<?php


namespace App\Controllers;

use App\Models\User;
use System\Core\BaseController;

class UsersController extends BaseController
{
    public function __construct()
    {
        auth(url('login'));
    }


    public function index()
    {
        $user = new User();
        $users = $user->where('type', 'User')->get();
        view('cms/users/index.php',compact('users'));
    }

    public function  create()
    {
        view('cms/users/create.php');
    }
}