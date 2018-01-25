<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 上午11:56
 */

/* redis新功能 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);
//redis ping指令
$status = $redis->ping();
echo "status = $status \n";

//把当前redis客户端模拟成节点
//$redis->slaveof("127.0.0.1",6380);

//redis中的事物,能保证事务之间的操作是一个原子操作
//操作的结果会保存在exec中
// redis 并不支持事务回滚。
$status = $redis->multi();  //事务开始
var_dump($status);
$count = $redis->sAdd("user:a",1,2,3,4,5,6);
var_dump($count);
$count = $redis->sAdd("user:b",1,2,3,4,5,6);
var_dump($count);
$status = $redis->exec();   //事务结束
var_dump($status);








