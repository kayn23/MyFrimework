<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 18.12.2018
 * Time: 14:29
 */

namespace MyFrimework\Maker;

class Maker
{
    public static function make_model($arg)
    {
        $path = 'src/Maker/tmpl/Model.php';
        $text = self::render($path,['name'=>$arg[2]]);
        $fp = fopen("App/Model/$arg[2].php",'w');
        fwrite($fp,$text);
        fclose($fp);
    }

    public static function make_controller($arg)
    {
        $path = (isset($arg[3]) && $arg[3] === 'full')
            ?'src/Maker/tmpl/Controller_full.php'
            :'src/Maker/tmpl/Controller.php';
        $text = self::render($path,['name'=>$arg[2]]);
        $fp = fopen("App/Controller/$arg[2].php",'w');
        fwrite($fp,$text);
        fclose($fp);
    }

    protected function render($fileName, $vars = array())
    {
        foreach ($vars as $k => $v) {
            $$k = $v;
        }
        ob_start();
        include $fileName;
        $text = "<? \r\n".ob_get_clean();
        return $text;
    }
}