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