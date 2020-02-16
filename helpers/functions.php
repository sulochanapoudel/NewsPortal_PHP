<?php

if(!function_exists('config')) {

    function config($key) {
        require BASEDIR."/config/settings.php";

        if(key_exists($key, $config)){
            return $config[$key];
        }
        else {
            return false;
        }
    }
}

if(!function_exists('view')){

    function view($file, $data = []){
        \System\Core\View::make($file, $data);
    }
}
if(!function_exists('url'))
{
    function url($uri= ''){
        return config('site_url').$uri;
    }
}
if(!function_exists('login_check')) {
    function login_check()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $user = new \App\Models\User;
            $check = $user->select('id')->where('id', $_SESSION['user'])->where('status','Active')->first();

            if (!is_null($check)) {
                return true;
            } else {
                return false;
            }
        }
        else {
            if (isset($_COOKIE['user']) && !empty($_COOKIE['user'])) {
                $user = new \App\Models\User;
                $check = $user->select('id')->where('id', $_COOKIE['user'])->where('status', 'Active')->first();

                if (!is_null($check)) {
                    $_SESSION['user'] = $check->id;
                    return true;
                } else {
                    return false;
                }
            }

    else {
        return false;
    }
    }

}
    }

    if (!function_exists('redirect')) {
        function redirect($url)
        {
            header("location: {$url}");
            die;
        }
    }
    if (!function_exists('auth')) {
        function auth($url)
        {
            if (!login_check()) {
                unset($_SESSION['user']);
                setcookie('user','',time()-60,'/');

                redirect($url); // redirect gareko by calling function
            }
        }
    }

    if (!function_exists('set_message')) {
        function set_message($message, $level = 'info')
        {
            $_SESSION['message'] = [
                'content' => $message,
                'level' => $level
            ];
        }
    }

    if (!function_exists('get_message')) {
        function get_message()
        {
            return $_SESSION['message'];
        }
    }

    if (!function_exists('delete_message')) {
        function delete_message()
        {
            unset($_SESSION['message']);
        }
    }

    if (!function_exists('check_message')) {
        function check_message()
        {
            return isset($_SESSION['message']) && !empty($_SESSION['message']);
        }
    }

if (!function_exists('guest')) {
    function guest($url)
    {
        if (login_check()) {
            redirect(url('login')); // if already logged in, direct dashboard ma direct lane insetead of logIn page
        }
    }
}

if(!function_exists('user')) {
    function user(){
        return new \App\models\User($_SESSION['user']);
    }

}