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

/* 阻塞操作

 */



