<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/22
 * Time: 下午4:33
 */

/* php 操作redis*/
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//$result = $redis->keys("*");
//var_dump($result);

$result = $redis->set("hello","what are you doing");
$result = $redis->get("hello");
echo "result = $result \n";

$result = $redis->expire("hello",5);

for( $i = 0;$i < 8;$i++) {
    $result = $redis->get("hello");
    echo "result = $result \n";
    sleep(1);
}

