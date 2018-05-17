<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/16
 * Time: 下午1:41
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$key = "yes";
for ($i = 0;$i < 10;$i++)
    $redis->rPush($key,$i);

$result = $redis->lRange($key,0,-1);
var_dump($result);

$redis->expire($key,0);