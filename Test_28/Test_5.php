<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/20
 * Time: 下午3:14
 */

$message = [
    "error_code" => "ok",
    "number" => 20
];

var_dump($message);

$message['hello'] = "world";
$message['info'] = [
    "user_id" => 1,
    "user_name" => 'xjj',
    "user_age" => 12
];

var_dump($message);