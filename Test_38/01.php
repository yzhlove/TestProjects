<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/24
 * Time: 下午9:39
 */



$redis = new Redis();
$redis->connect("127.0.0.1",6379);
$redis_test_key = "tttt";
$redis->expire($redis_test_key,5);

if ($redis->exists($redis_test_key)) {
    echo 'yes';
} else {
    echo 'no';
}




