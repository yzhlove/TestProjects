<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/30
 * Time: 上午9:54
 */

/* PHP 可变参数 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

function set_value($value) {

    global $redis;
    $redis->sAddArray("value",$value);
}

$arr = ["a","b","c","d","e","f","g"];
set_value($arr);

$data = $redis->sMembers("value");

var_dump($data);

$redis->expire("value",1);