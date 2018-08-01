<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/29
 * Time: 上午12:58
 */


$application = new stdClass();
$application->a = 100;
$application->b = 'string';

var_dump((array)$application);

$arr = [1,2,3,4=> 'hello',5 => 'world'];
var_dump($arr);


$str_json = json_encode((array)$application,JSON_UNESCAPED_UNICODE);
echo 'application:' . $str_json;



