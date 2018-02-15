<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/20
 * Time: 下午2:34
 */

/* PHP 操作redis */

//连接redis
$redis = new Redis();
$result = $redis->connect("127.0.0.1",6379);
$redis->open();
$redis->popen();


if (!$result) {
    echo "redis disconnect!\n";
}

//set 操作
$redis->set("yzhLove","1111111111");
$result = $redis->get("yzhLove");

var_dump($result);

$redis->set("Name","我是中国人！");
$result = $redis->get("Name");
var_dump($result);

$result = $redis->dbSize();
var_dump($result);

$result = $redis->strlen("Name");
var_dump($result);