<?
include_once '../vendor/autoload.php';
$GLOBALS['config'] = parse_ini_file('../config.ini');

use MyFrimework\App;

App::init();
d($GLOBALS['config']);