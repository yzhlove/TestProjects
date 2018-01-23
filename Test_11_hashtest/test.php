<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午4:28
 */

/* 利用redis存取用户信息 */

require_once "dbUtil.php";

$db_help = new DbUtil_Help();
$result = $db_help->query("select * from game_users",5);

//var_dump($result);
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$user_arr = [];
for ($i = 0;$i < count($result);$i++) {
    $type = ["id","fd","login_name","nick_name","sid"];
    $temp = [];
    for ($j = 0;$j < count($type);$j++)
        $temp[$type[$j]] = $result[$i][$j];
    $user_arr[] = $temp;
}

//var_dump($user_arr);

// 将数据库的数据存入缓存
for ($i = 0;$i < count($user_arr);$i++) {
    $redis->hMset("game_user_id:" . ($i + 1),$user_arr[$i]);
    //取出数据
    $redis->expire("game_user_id:" . ($i + 1),60 * 60);
}

//从缓存中取出数据
for ($i = 0;$i < count($user_arr);$i++) {
    $result = $redis->hGetAll("game_user_id:" . ($i + 1));
    var_dump($result);
}











