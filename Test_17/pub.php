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

for ($i = 1;$i < 20;$i++) {
    sleep(1);
    $index = mt_rand(0,1);
    $cctv = mt_rand(1,4);
    $channle = $arr[$index] == "blibli" ? $arr[$index] : $arr[$index] . "-" . $cctv;
    $redis->publish($channle,"$channle: are you ok?");
    echo "channel = " . $channle . "\n";
}





