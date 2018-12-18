<?
include_once '../vendor/autoload.php';
$GLOBALS['config'] = parse_ini_file('../config.ini');
d($GLOBALS['config']);

use MyFrimework\App;

App::init();