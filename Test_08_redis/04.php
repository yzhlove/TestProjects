<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/22
 * Time: 下午8:32
 */

/* php 中的redis操作 */
try {

    $redis = new Redis();
    $redis->connect("127.0.0.1",6379);
    $string = $redis->get("hello");

    /* redis基本操作 */

     // 操作字符串
     $status = $redis->set("love","xjj");
     $result = $redis->get("love");

     echo "status = $status | result = $result \n";

     //自增操作
    $status = $redis->set("number",8);
    $status = $redis->incr("number");
    $number = $redis->get("number");

    echo "status = $status | number = $number \n";

    //查看key的内部编码
    $result = $redis->object("encoding","love");
    echo "object_encoding = $result \n";

    // 批量设置
    $status = $redis->mset([
        "a" => "action",
        "b" => "before",
        "c" => "clion",
        "d" => "developer",
        "e" => "egrent",
        "f" => "finish"
    ]);

    //批量获取
    $result = $redis->mget([
       "a","b","c","d","e","f"
    ]);

    var_dump($result);

    echo "<----------------------------->\n";
    //list操作
    //判断listlove 这个key是否存在
    if (!$redis->exists("listlove")) {
        $status = $redis->rPush("listlove","xyj");
        $status = $redis->rPush("listlove","xjj");
        $status = $redis->rPush("listlove","yurisa");
        $status = $redis->rPush("listlove","lcm");

        // lange操作
        $list = $redis->lRange("listlove",0,-1);
        var_dump($list);
    }

    if (!$redis->exists("map")) {
        //map
        $status = $redis->hSet("map","user_name","xjj");
        $status = $redis->hSet("map","age","22");
        $status = $redis->hSet("map","birthday","1996-02-21");

        $map = $redis->hGetAll("map");
        var_dump($map);
    }

    //



} catch (Exception $exception) {
    echo $exception->getMessage();
    if ($redis)
        $redis->close();
}