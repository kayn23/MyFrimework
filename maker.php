<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 18.12.2018
 * Time: 14:16
 */


/**
 * maker_model name Создает модель
 * maker_controller name [full] Создает констроллер, если указан full то с базовыми методами
 */
include_once 'vendor/autoload.php';
use MyFrimework\Maker\Maker;
print_r($argv);
Maker::{$argv[1]}($argv);
