<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/21
 * Time: 下午8:16
 */


$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$key = "user_list";

for ($i = 1;$i <= 10;$i++) {
    $redis->zAdd($key,$i,$i);
}

print_r($redis->zRange($key,0,-1,true));

var_dump($redis->zRevRank($key,9));


$redis->expire($key,0);