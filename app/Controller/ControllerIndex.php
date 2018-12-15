<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 14.12.2018
 * Time: 11:54
 */

namespace App\Controller;


class ControllerIndex
{
    public function index()
    {
        echo "hello";
    }
    public function app($id)
    {
        echo "првиет $id[0]";
    }
}