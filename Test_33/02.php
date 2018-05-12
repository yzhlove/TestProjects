<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/8
 * Time: 上午11:18
 */

# 测试

$str = "image\jpeg";

$result = explode('\\',$str);
var_dump($result);

echo "-----------------\n";

$arr = [0,1,2,3,4,5,6];
$at = ["0","2","4","6","9"];

$result = array_filter($arr);
var_dump($result);

$result = array_filter($at);
var_dump($result);

