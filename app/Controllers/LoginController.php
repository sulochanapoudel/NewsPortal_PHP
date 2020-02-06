<?php


namespace App\Controllers;


use System\Core\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        view('cms/login/index.php');
    }
}