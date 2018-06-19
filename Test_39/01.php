<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/14
 * Time: 下午7:39
 */

$array = [1,2,3,4,5];

array_unshift($array,3);
$temp = array_unique($array);

var_dump($temp);


echo "==============================\n";

$temp = [
    ['seat' => 0,'sid' => 100],
    ['seat' => 0,'sid' => 200],
    ['seat' => 1,'sid' => 300],
    ['seat' => 5,'sid' => 500],
    ['seat' => 4,'sid' => 500],
    ['seat' => 0,'sid' => 600],
    ['seat' => 3,'sid' => 700],
    ['seat' => 2,'sid' => 800],
    ['seat' => 0,'sid' => 1200]
];

$new_temp = [];
foreach ($temp as $item) {
    if ($item['seat']) $new_temp[$item['seat']] = $item['sid'];
}

echo "==============================new_temp\n";
var_dump($new_temp);

echo "==============================new_temp\n";
ksort($new_temp);
var_dump($new_temp);

echo "==============================unique\n";
$u_tp = array_flip(array_flip($new_temp));
var_dump($u_tp);

echo "==============================add\n";
//array_unshift($u_tp,1024,2048);


$u_tp = [1024] + $u_tp;
var_dump($u_tp);




