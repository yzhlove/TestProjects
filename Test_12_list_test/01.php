<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午8:40
 */

/* redis list 阻塞操作测试 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// brpop操作
// time_out = 0 一直阻塞，直到右元素能被pop
// time_out > 0 阻塞指定的秒数后返回

$status = $redis->blPop("hello_love",0);
var_dump($status);

//操作成功返回
/*
  array(2) {
  [0]=>
  string(10) "hello_love"   => key
  [1]=>
  string(1) "3"             => value
}
 */

$status = $redis->blPop("hello_cache",3);
var_dump($status);
/*
 * 失败返回一个空数组
 * */

/* 阻塞操作,注意事项
1）如果是多个key，那么brpop会从左至右遍历key，一旦有一个key能弹出元素，客户端立即返回。
2）多个客户端对同一个key执行brpop,最先指定的客户端可以获取到pop出来的值，如果此时key为nil，则其他客户端继续阻塞，直到有元素被push.

 */



