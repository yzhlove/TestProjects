<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午5:04
 */

/* redis 列表操作 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//rPush 从右向左插入元素
$redis->rPush("love_list","a","b","c");

//从左向右获取所有元素
$data = $redis->lRange("love_list",0 ,-1);
var_dump($data);

//lPush从左向右插入元素
$redis->lPush("list_love","a","b","c");
$data = $redis->lRange("list_love",0,-1);
var_dump($data);

echo "<-------------------------->\n";

//向某个元素的前面或者后面插入元素
//BEFORE -> 前面
//AFTER  -> 后面
$redis->lInsert("list_love",Redis::BEFORE,"a","what");
$data = $redis->lRange("list_love",0,-1);
var_dump($data);

//向某个元素的后面插入元素
$redis->lInsert("list_love",Redis::AFTER,"a","love");
$data = $redis->lRange("list_love",0,-1);
var_dump($data);

//在指定的范围查找元素 (lrange)
// lrange 从左向右数分别是 [1 ~ N]
// lrange 从右向左数分别是 [-1 ~ -N ]

// listlove 有8个元素
//从左向右
echo "<-------------------------->\n";
$result = $redis->lRange("listlove",0,8);
var_dump($result);

$result = $redis->lRange("listlove",-8,-1);
var_dump($result);

echo "<-------------------------->\n";

//获取指定下标的元素
// 正数，从左到右开始数
// 负数，从右到左开始数
// 获取第二个元素 （从0开始）
$data = $redis->lIndex("listlove",1);
echo "index_1 = $data \n";

//获取最后一个元素
$data = $redis->lIndex("listlove",-1);
echo "index_-1 = $data \n";

echo "<-------------------------->\n";

//删除操作
//lpop 从列表左侧弹出元素
$pop_data = $redis->lPop("listlove");
echo "lpop = $pop_data \n";

//rpop 从列表右侧弹出元素




//设置key的过期时间
$redis->expire("list_love",1);
$redis->expire("love_list",1);



