<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 上午11:14
 */

/* redis 中集合常用的操作 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 往集合中添加元素

