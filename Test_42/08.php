<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/3
 * Time: 下午2:38
 */


$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$key = 'user_seat_info';

$redis->hSet($key,'1',null);
$redis->hSet($key,'2','1234');

$user_info = $redis->hGetAll($key);
var_dump($user_info);

$user = $redis->hGet($key,'1');
var_dump($user);

$redis->delete($key);