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

    public static function get($url, $controller)
    {
        $arr = explode('@', $controller);
        self::$get[$url] = [
            'controller' => 'App\Controller\\' . $arr[0],
            'action' => $arr[1]
        ];
    }

    public static function post($url, $controller)
    {
        $arr = explode('@', $controller);
        self::$post[$url] = [
            'controller' => $arr[0],
            'action' => $arr[1]
        ];
    }

    protected static function method()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
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
        if (array_search($url, self::$$method)) {
            $method = self::$$method[$url];
            return $method;
        } else {
            //todo сделать страницу ошибки
            die('404');
        }
    }
}