<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/6
 * Time: 下午7:56
 */

$arr = [
    ["1234" => 4]
];

$data =  json_encode($arr,JSON_UNESCAPED_UNICODE);
echo "data = " . $data . "\n";
$arr = json_decode($data);
var_dump($arr);

$arr[] = ["5678"=>8];
$data =  json_encode($arr,JSON_UNESCAPED_UNICODE);
echo "data = " . $data . "\n";
$arr = json_decode($data);
var_dump($arr);
