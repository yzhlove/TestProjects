<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/12
 * Time: 上午10:58
 */

/* redis 乐观锁 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$strKey = "Test_bihu_age";
$redis->set($strKey,10);
$age = $redis->get($strKey);

//  监控key是否改变
$redis->watch($strKey);

// 执行事务
$redis->multi();
$redis->set($strKey,120);
$redis->exec();

$age = $redis->get($strKey);
echo "age = $age \n";
// 在事务执行的过程中，如果key从调用watch之后整个过程发生变化，则整个事务执行失败

$redis->expire($strKey,1);

