<?php


namespace App\Controllers;


use App\Models\User;
use System\Core\BaseController;

class LoginController extends BaseController
{

    public function __construct() //object is created from the class when function is called, construct function is called
       // kunai pani class ko object banauda automatically call hunchha bhane that is called constructor
        // end of script or object need to be destructed is called destructor, these are known as magic method
    {
        guest(url('dashboard'));
    }

    public function index()
    {
        view('cms/login/index.php');
    }

    public function check()
    {
        extract($_POST);
        $password = sha1($password);

        $user = new User;

        $check = $user->where('email', $email)
            ->where('password', $password)
            ->first();

        if(!is_null($check)) {

            $_SESSION['user'] = $check->id;

            if(isset($remember) && $remember =='yes') {
                setcookie('user', $check->id, time()+ 30*24*60*60, '/');
            }
            redirect(url('dashboard'));

        }
        else {
            set_message("Emial and/or password is incorrect.", "danger");
            redirect(url('login'));
        }
    }
}