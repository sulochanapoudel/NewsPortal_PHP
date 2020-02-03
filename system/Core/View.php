<?php


namespace System\Core;


use System\Exceptions\FileNotFoundException;

class View
{

    public static function make($file, $data = [])
    {
        $view_base = BASEDIR."/views";
        $filename = $view_base.'/'.$file;

        if(is_file($filename)){
            if(!empty($data)){
                extract($data);
            }
            require $filename;
        }
        else{
            throw new FileNotFoundException("View file '{$filename}' not found in '{$view_base}'");
        }
    }

}
