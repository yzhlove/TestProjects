<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 上午10:37
 */

/* 用户根据key获取文行的内容 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);
for ($i = 1;$i <= 2;$i++) {
    $conect_key = $redis->blPop("content",0);
    // 根据key拿到内容(返回为一个数组)
    $data = $redis->hGetAll($conect_key[1]);
    //显示内容
    var_dump($data);
}

