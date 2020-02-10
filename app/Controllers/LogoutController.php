<?php


namespace App\Controllers;


use System\Core\BaseController;

class LogoutController  extends BaseController
{
    public function index()
    {
        unset($_SESSION['user']);
        setcookie('user','',time()-60,'/');

        redirect(url('login'));
    }
}