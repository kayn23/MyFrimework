<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 13.12.2018
 * Time: 11:11
 */

namespace MyFrimework;
use MyFrimework\Route\Register;

class Route extends  Register
{
    public static function init($url){
        $action = self::getAction($url);
        d($action['controller']);
        $controller = new $action['controller']();
        $action = $action['action'];
        $controller->$action();
    }
}