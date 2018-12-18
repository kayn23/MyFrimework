<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 14.12.2018
 * Time: 11:54
 */

namespace App\Controller;
use MyFrimework\Controllers\Controller;
use MyFrimework\Database\Model\Model;

class ControllerIndex extends Controller
{
    public function index()
    {
        $this->render('main.twig',['name'=>'hello']);
    }
    public function app($id)
    {
        $data = ['id'=>$id[0]];
        $this->json($data,200);
    }
}