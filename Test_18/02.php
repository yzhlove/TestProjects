<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/29
 * Time: 下午4:43
 */
/* redis  中的hscan */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$iterator = null;

