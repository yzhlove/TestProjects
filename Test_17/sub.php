<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/26
 * Time: 上午11:37
 */
/* redis 按模式发布以及订阅 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/* ------------------- */
//因为订阅之后会处于阻塞状态，所以只能订阅一次，但是可以订阅多个频道

//普通订阅
function channel_change($instance,$channel,$message) {

//    var_dump($instance);  //redis 对象
    echo "channle: $channel \n";
    echo "message: $message \n";

}

$redis->subscribe(["cctv-1","cctv-2"],"channel_change");

