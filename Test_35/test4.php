<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/15
 * Time: 下午5:48
 */


$redis = new Redis();
$redis->connect("127.0.0.1",6379);

echo $redis->incr("hello");
echo $redis->incr("hello");

$redis->expire("hello",0);
