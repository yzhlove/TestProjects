<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: apple
 * Date: 2018/4/13
 * Time: 下午1:33
 */

$price = intval(25.00);
echo 'price = ' . $price . "\n";

$price = intval(25.20);
echo 'price = ' . $price . "\n";

echo "-----------------------------\n";

$temp = 43.4;
var_dump($temp);
$price = " {$temp} ";
var_dump($price);

$i = 45.678;
$tp = $i . " ";
var_dump($tp);

echo "-----------------------------\n";

$result = bcmul("123.456",'345.6',2);
$temp = 123.456 * 345.6;

echo 'result = ' . $result;
echo " temp = " . $temp;

$arr = [
    "pic" => '123123','title' => '123'
];
echo "\n";
echo json_encode(['data' => $arr]);
