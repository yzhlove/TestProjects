<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 上午11:46
 */

/* json测试 */
$str = "{}";
$json_obj = json_decode($str);
var_dump($json_obj);
$json_obj_arr = json_decode($str,true);
var_dump($json_obj_arr);
echo "-----------------\n";

$str = "";
$json_obj = json_decode($str);
var_dump($json_obj);
$json_obj_arr = json_decode($str,true);
var_dump($json_obj_arr);
