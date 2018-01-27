<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/26
 * Time: 上午11:37
 */
/* redis 按模式订阅 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/*-------------------------------*/
// 按照模式发布
//cctv,blibli
$arr = ["cctv","blibli"];

for ($i = 1;$i <= 50;$i++) {
    sleep(1);
    $index = mt_rand(0,1);
    $cctv = mt_rand(1,4);
    $channle = $arr[$index] == "blibli" ? $arr[$index] : $arr[$index] . "-" . $cctv;
    $redis->publish($channle,"$channle: are you ok? [$i]");
    echo "channel = " . $channle . "\n";
}

// 产看活跃的频道
$channels_num = $redis->pubsub("channels");
var_dump($channels_num);

$channels_cctv = $redis->pubsub("channels","cctv-*");
var_dump($channels_cctv);

// 查看频道订阅数
$channels_numsub = $redis->pubsub("numsub",["cctv-1","cctv-2"]);
var_dump($channels_numsub);

// 查看模式订阅数
$channels_numpat = $redis->pubsub("numpat");
echo "channels_numpat = $channels_numpat \n";





