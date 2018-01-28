<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/27
 * Time: 上午10:10
 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/* ------------------- */

function channel_change($redis,$pattern,$channel,$message) {
    echo "pattern = $pattern \n";
    echo "channel = $channel \n";
    echo "message = $message \n";
}

//模式订阅
$redis->psubscribe(["cctv-*","blibli"],"channel_change");
