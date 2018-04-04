<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/26
 * Time: 下午4:38
 */

$arr = [2,2,2,2,2,2];
$result = max($arr);
echo "result = " . $result;

echo "-------------------\n";

echo is_numeric('50');
echo is_numeric('50.00');
echo is_numeric('50.10');

echo "-------------------\n";

echo is_int('50');
echo is_int('50.00');
echo is_int('50.10');

echo "-------------------\n";

echo is_integer('50');
echo is_integer('50.00');
echo is_integer('50.10');

echo "-------------------\n";

echo is_numeric('50.00');
echo strpos("hello.world",".");
echo '\n';
echo strpos('hello','.');
echo '\n';
echo strpos('.hello','.');

echo "-------------------\n";

$keyword = '10.00'; // 0 1.1 1
if(preg_match("/^[1-9][0-9]*$/",$keyword)){
    echo "是整数！";
} else {
    echo "不是整数！";
}




