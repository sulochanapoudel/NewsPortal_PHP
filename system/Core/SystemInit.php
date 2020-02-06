<?php


namespace System\Core;


use System\Exceptions\ControllerNotValidException;
use System\Exceptions\FileNotFoundException;

class SystemInit
{
    public function __construct()
    {
        session_start();
    }
    public function start()
    {
        $parts = $this->getUrlParts();
        $this->run($parts['controller'], $parts['method'],$parts['argument']);

    }
    private function getUrlParts()
    { //dump($_SERVER); //it has connection related all variables
        $parts = [];
        if(!empty($_SERVER['PATH_INFO'])){
            $segments = explode('/', $_SERVER['PATH_INFO']);
            //dump($segments);

            $parts['controller'] = ucfirst($segments[1])."Controller";//ucfirst bhaneko-uppercase first character
            if(!empty($segments[2])){
                $parts['method'] = $segments[2];
            }
            else {
                $parts['method'] = 'index';
            }
            if(!empty($segments[3])){
                $parts['argument'] = $segments[3];
            }
            else {
                $parts['argument'] = null;
            }
           // dump($parts);
        }
        else {
            $parts = [
                'controller' => ucfirst(config('default_controller')).'Controller',
                'method' => 'index',
                'argument' => null
            ];
        }
        return $parts;
    }
    private function run($controller, $method, $argument = null)
    {
       $controller_file = BASEDIR."/app/Controllers/{$controller}.php";
        if(is_file($controller_file)){

            $controller_class = "\App\Controllers\\{$controller}"; //namespace ma back slash, files ma forward slash. Backslash le symbol mai ignore garchha. so use two \\
            $obj = new $controller_class;
            //instanceof le check garchha, $obj ma Basecontroller  ako chha kee chhaina bhanera
            if($obj instanceof BaseController){
                if(is_null($argument)){
                    $obj->{$method}();
                }
                else {
                    $obj->{$method}($argument);
                }
            }
            else {
                throw new ControllerNotValidException("Class'{$controller_class}'is not valid controller as it doesnot inherit '\System\Core\BaseController' class.");
            }
        }
        else {
            throw new FileNotFoundException("Controller file '{$controller_file}' doesnot exit.");
        }
    }
}