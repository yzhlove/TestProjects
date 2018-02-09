<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/6
 * Time: 下午1:40
 */


$redis = new Redis();
$redis->connect("127.0.0.1",6379);
$status = $redis->hSet("hashmap","user_name","yurisa");

// 获取值
$name_str = $redis->hGet("hashmap","user_name");
echo "name_str = $name_str \n";

//判断Hashkey是否存在
$status = $redis->hExists("hashmap","user_name_2:123");
echo "status = " . $status . "\n";
if ($status) {
    echo "user_name is exists already !\n";
} else {
    echo "what are you doing ... \n";
}
