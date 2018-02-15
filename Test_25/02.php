<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/11
 * Time: 下午4:02
 */

$key = "redis:zadd";

$redis =new Redis();
$redis->connect("127.0.0.1",6379);

$name_arr = ["a","b","c","d","e","f","g","h"];

$length = count($name_arr);

for ($i = 0;$i < $length;$i++) {
    $rabk = mt_rand(1,100);
    $redis->zAdd($key,$rabk,json_encode(["name" => $name_arr[$i]],JSON_UNESCAPED_UNICODE));
}

$data_one = $redis->zRevRange($key,0,-1,true);
print_r($data_one);

$data_tow = $redis->zRange($key,0,-1,true);
print_r($data_tow);

$redis->expire($key,1);






