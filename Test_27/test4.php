<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/26
 * Time: 上午9:47
 */

// zadd 权重测试

define('REDIS_TEST_KEY','redis_test');

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$redis->zAdd(REDIS_TEST_KEY,1,'xjj',1,'yzh');

$result = $redis->zRange(REDIS_TEST_KEY,0,-1,true);
print_r($result);

$redis->zIncrBy(REDIS_TEST_KEY,+1,'xjj');
$redis->zIncrBy(REDIS_TEST_KEY,1,'yzh');

$result = $redis->zRange(REDIS_TEST_KEY,0,-1,true);
print_r($result);

$redis->zIncrBy(REDIS_TEST_KEY,+1,'xjj');
$redis->zIncrBy(REDIS_TEST_KEY,4,'yzh');

$result = $redis->zRange(REDIS_TEST_KEY,0,-1,true);
print_r($result);

$redis->zIncrBy(REDIS_TEST_KEY,+1,'xjj');
$redis->zIncrBy(REDIS_TEST_KEY,4,'yzh');


$result = $redis->zRange(REDIS_TEST_KEY,0,-1,true);
print_r($result);

$redis->expire(REDIS_TEST_KEY,1);

