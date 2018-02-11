<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/9
 * Time: 下午3:46
 */
/* redis 应用实战 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// SET应用
$strCacheKey = "Test_bihu";

$arrCacheData = [
    "name" => 'job',
    'sex'  =>  '男',
    'age'  =>  '30'
];

$redis->set($strCacheKey,json_encode($arrCacheData,JSON_UNESCAPED_UNICODE));
$redis->expire($strCacheKey,30);

$json_data = $redis->get($strCacheKey);
print_r($json_data);

// HSET 应用


