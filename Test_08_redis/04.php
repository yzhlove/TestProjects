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

    //string 追加值
    $status = $redis->append("a"," movie");
    $result = $redis->get("a");
    echo "append: result = $result \n";

    //计算字符串的长度
    $length = $redis->strlen("a");
    echo "length = $length \n";

    //string getset 操作
    $result_str = $redis->getSet("a","I Love Love xjj");
    echo "result_string = $result_str \n";
    $string = $redis->get("a");
    echo "get_string = $string \n";

    echo "<----------------------------->\n";

    //设置字符串指定位置的值
    $set_string = $redis->setRange("b",5,"e love");
    $result = $redis->get("b");
    echo "set_string = $result \n";

    //获取部分字符串
    $str = $redis->getRange("a",0,5);
    echo "str = $str\n";

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