<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 14.12.2018
 * Time: 11:32
 */

namespace MyFrimework\Route;


class Register
{
    protected static $get = [];
    protected static $post = [];

    //todo в перспективе put delete

    public static function get($url,$controller)
    {
        self::$get[$url] = $controller;
    }

    public static function post($url,$controller)
    {
        self::$post[$url] = $controller;
    }

    protected static function method()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case "GET":
                return 'get';
                break;
            case "POST":
                return 'post';
                break;
        }
    }

    protected static function getAction($url)
    {
        $method = self::method();
        $control = self::$$method[$url];
        $control = explode('@',$control);
        $control[0] = 'App\Controller\\'.$control[0];
        return $control;
    }
}