<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/27
 * Time: 上午10:29
 */

/* redis 发布订阅 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 普通订阅
function channel_change($instance,$channel,$message) {
//    var_dump($instance);  //redis 对象
    echo "channel = $channel \n";
    echo "message = $message \n";
}

$redis->subscribe(["blibli"],"channel_change");



