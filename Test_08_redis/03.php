<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/22
 * Time: 下午8:27
 */

/* php 中的redis 操作 */

//生成一个redis对象
$redis_instance = new Redis();
$redis_instance->connect("127.0.0.1",6379);

$result = $redis_instance->set("hello","world");
$string = $redis_instance->get("hello");

echo "$result = $string";




