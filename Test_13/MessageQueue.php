<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 上午10:22
 */

/* 利用redis构建消息队列 */

// 利用 map构建文章内容
$redis = new Redis();
$redis->connect("127.0.0.1", 6379);

// 加入数据
$status = $redis->hMset("user:1", [
    "user_name" => "xjj",
    "user_Age" => 22,
    "user_tag" => "beautiful"
]);
$status = $redis->hMset("user:2", [
    "user_name" => "xyj",
    "user_Age" => 22,
    "user_tag" => "none"
]);
$status = $redis->hMset("user:3", [
    "user_name" => "lcm",
    "user_Age" => 22,
    "user_tag" => "none"
]);

//将key加入到列表里面
for ($i = 0; $i < 3; $i++) {
    $status = $redis->rPush("content", "user:" . ($i + 1));
    if (!$status) {
        echo "push failure!";
        return;
    }
}

//设置key过期时间
for ($i = 1; $i <= 3; $i++)
    $redis->expire("user:".$i, 60 * 60);



















