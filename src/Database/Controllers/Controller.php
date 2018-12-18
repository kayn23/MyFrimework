<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 18.12.2018
 * Time: 13:43
 */

namespace MyFrimework\Database\Controllers;
use MyFrimework\Code;

class Controller
{
    /**
     * используется для рендера страницы
     * @param $page
     * @param $var
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($page, $var)
    {
        $loader = new \Twig_Loader_Filesystem('../v');
        $twig = new \Twig_Environment($loader);
        echo $twig->render($page, $var);
    }

    /**
     * Возвращает json при отправке
     * @param $data
     * @param int $code
     * @param string $textStatus
     */
    public function json($data, $code = 200, $textStatus = '')
    {
        if ($textStatus === '') {
            $textStatus = Code::code[$code];
        }
        header("HTTP/1.1 $code $textStatus");
        $data = json_encode($data);
        echo $data;
    }
}