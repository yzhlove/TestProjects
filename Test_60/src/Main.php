<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/8
 * Time: 下午2:57
 */
namespace src;

require_once "RedisLock.php";

$config = [
    'host' => '127.0.0.1',
    'port' => '6379',
    'index'=> 0,
    'auth' => '',
];

$redisLock = new RedisLock($config);
$mutex_lock_key = 'mutex_lock';
$is_lock = $redisLock->lock($mutex_lock_key,10);
if ($is_lock) {
    echo "what are you doing ... \n";
} else {
    echo "are you kidding me ... \n";
}

