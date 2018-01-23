<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午11:10
 */

/* redis map 操作 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//redis中操作map（Hash）

 // 设置值
$status = $redis->hSet("hashmap","user_name","yurisa");

// 获取值
$name_str = $redis->hGet("hashmap","user_name");
echo "name_str = $name_str \n";

//如果键不存在返回nil(redis) false(php)
$name_age = $redis->hGet("hashmap","user_age");
var_dump($name_age);

echo "<---------------------------->\n";

// 删除hashKey
$status = $redis->hSet("hashmap","user_age",22);
$name_age = $redis->hGet("hashmap","user_age");
echo "hashmap_user_age = $name_age \n";
//返回删除key的个数
$status = $redis->hDel("hashmap","user_age");
$name_age = $redis->hGet("hashmap","user_age");
echo "hashmap_user_age = $name_age \n";

echo "<---------------------------->\n";

//计算hashKey的个数





