<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 下午8:46
 */
/* redis 发布订阅  */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

function handlerMessage($instance,$channel,$message) {
    var_dump($instance);
    var_dump($channel);     //消息类型
    var_dump($message);     //消息内容

    global $redis;

    $arr = explode("-",$message);
    if ($arr[0] == "16") {
        echo "phpredis 没有取消订阅这个方法\n";
    }
}

/* 订阅消息 */
$channel = ['cctv'];
$redis->subscribe($channel,"handlerMessage");

