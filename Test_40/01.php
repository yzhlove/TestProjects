<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/22
 * Time: 下午5:48
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$key = "yzh_love_xjj";
$redis->setex($key,10,1);
$result = $redis->get($key);
echo "ttl:" . $redis->ttl($key);
echo "result = " . $result;

sleep(8);
echo "\n";
echo "ttl:" . $redis->ttl($key);

$result = $redis->get($key);
echo "\n";
echo "ttl:" . $redis->ttl($key);
echo "result = " . $result;

