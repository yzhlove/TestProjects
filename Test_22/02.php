<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/7
 * Time: 上午12:13
 */
/* 取到当前数组的键名 */

$arr = [
    ["one" => 1],
    ["two" => 2]
];

$array = [
    "1234" => 120,
    "5678" => 170
];

var_dump($array);
arsort($array);

var_dump($array);

echo key($array);

