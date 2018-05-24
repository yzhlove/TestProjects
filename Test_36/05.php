<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/17
 * Time: 下午9:26
 */
# json解析层数

$json = '{"action":"update_score","data":{"score":18}}';

echo $json ;

echo "\n======\n";

$result = json_decode($json,true,3);
var_dump($result);