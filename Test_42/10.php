<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/3
 * Time: 下午3:56
 */

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$key = '123456haha';
$redis->expire($key,10);

if ($redis->exists($key)) {
    echo 'Yes';
} else {
    echo 'No';
}
