<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/24
 * Time: 上午10:23
 */

define('REDIS_KEY',"hello_world");

/* 关于redis的zadd测试 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 房间ID
$redis->zAdd(REDIS_KEY,3,"xyj");
$redis->zAdd(REDIS_KEY,3,"xjj");

$redis->zAdd(REDIS_KEY,4,"yzh");
$redis->zAdd(REDIS_KEY,4,"lcm");

$redis->zAdd(REDIS_KEY,5,"hxy");
$redis->zAdd(REDIS_KEY,5,"hqq");


// 通过房间的ID拿到用户
/* zRangeByScore 是一个闭区间 */
$result = $redis->zRangeByScore(REDIS_KEY,4,4);
print_r($result);

// 删除用户
$result = $redis->zRemRangeByScore(REDIS_KEY,3,3);
echo "result = $result \n";

// 查询所有的用户
$result = $redis->zRange(REDIS_KEY,0,-1,true) ;
print_r($result);

//  更具用户id查询房间
$room_id = $redis->zScore(REDIS_KEY,"yzh");
echo "score_room_id = " . $room_id . "\n";


$redis->expire(REDIS_KEY,1);



