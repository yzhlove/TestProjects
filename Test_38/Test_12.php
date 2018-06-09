<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/9
 * Time: 下午3:24
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$result = $redis->del('hello world');
