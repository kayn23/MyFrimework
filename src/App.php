<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 14.12.2018
 * Time: 10:49
 */

namespace MyFrimework;

class App
{
    public static function init()
    {
        date_default_timezone_set('Europe/Moscow');
        //todo тут подключение к bd;
//        $query_url = $_SERVER['REQUEST_URI'];
        include_once '../Route/web.php';
        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            new Route($_SERVER["REQUEST_URI"]);
        }
    }
}