<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/5
 * Time: 下午9:03
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);
$key = "index";
$redis->incr($key);
echo $redis->get($key) . "\n";
$redis->decr($key);
echo $redis->get($key) . "\n";

$redis->expire($key,1);