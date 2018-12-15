<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 13.12.2018
 * Time: 11:11
 */

namespace MyFrimework;

class Route
{
    public function __construct($request_uri)
    {
        global $routing;
        $request_uri = trim($request_uri, ' /');
        $className = '';
        $actionName = '';
        $route_data = array();
        //***
        $matches = array();
        $args = array();
        foreach ($routing as $key => $values)
        {
            $tmp = str_replace('/', '\/', $key);
            $tmp = str_replace('|', '', $tmp);
            if (preg_match_all('/' . $tmp . '/', $request_uri, $matches, PREG_SET_ORDER) === 1)
            {
                $route_data = $values;
                $className = 'App\\Controller\\'.$route_data['controller'];
                $actionName = $route_data['action'];

                $tmp = explode('|', $key);
                d($tmp);
                if (isset($tmp[1]))
                {
                    $tmp = str_replace($tmp[0], '', $request_uri);
                    $tmp = trim($tmp, ' /');
                    if (!empty($tmp))
                    {
                        $args = explode('/', $tmp);
                    }
                }
                break;
            }
        }

        if (class_exists($className))
        {
            $controller = new $className();
            $controller->{$actionName}($args);
        }
        // } else
        // {
        //сдесь обработка ошибки
        // }
    }
}