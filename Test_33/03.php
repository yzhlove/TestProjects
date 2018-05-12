<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/8
 * Time: 下午8:59
 */

$arr = [0 => 'i',1=>'love',2=>'you'];

print_r($arr);

$tmp  = [];
foreach ($arr as $key => $value) {
    $key = '"' . $key . '"';
    $tmp[$key] = $value;
}

print_r($tmp);

$str = '/Users/apple/projects/pet_php/temp/b8f4qzg9yk.jpeg';

$index = stripos('.',$str);
echo "index = " . $index;

echo "===============\n";

echo strtotime("2018-04-01");

//query = \" where updated >= 1522512000 \"
