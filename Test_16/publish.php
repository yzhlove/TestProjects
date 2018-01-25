<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 下午5:44
 */
/* redis发布订阅 */
/* sendMessage */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//频道名
$channel = "cctv";
$message = "中国首款超级计算机银河一号飞出月球!";

//发布消息
for ($i = 0;$i < 20;$i++) {
    sleep(5);
    //返回订阅数
    $status = $redis->publish($channel,$i . "-" . $message);
    echo "status = $status \n";
}




