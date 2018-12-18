<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 14.12.2018
 * Time: 11:24
 */

$GLOBALS['routing'] = array(
    '' => array(
        'controller' => 'ControllerIndex',
        'action' => 'index'
    ),
//    'app' => array(
//        'controller' => 'ControllerIndex',
//        'action' => 'index'
//    ),
    'app/|[\d]+'=> array(
        'controller' => 'ControllerIndex',
        'action' => 'app'
    )
);