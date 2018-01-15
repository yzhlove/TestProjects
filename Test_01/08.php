<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午6:00
 */

/*  json 转数组测试 */

//数组转json
$arr = [1,2,3];
echo json_encode($arr);

//json转数组
$json_arr = json_encode($arr);
echo "\n";
var_dump(json_decode($json_arr));


unset($arr[1]);
var_dump($arr);




