<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/5
 * Time: 上午10:41
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$arr = [
    "1" => 100,
    "2" => 200
];

$redis->set("current_user_score",json_encode($arr,JSON_UNESCAPED_UNICODE));

$json_data = $redis->get("current_user_score");
echo "json_data = " . $json_data . "\n";

$user_arr = json_decode($json_data,true);
print_r($user_arr);

$redis->expire("current_user_score",1);