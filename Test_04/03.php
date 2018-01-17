<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午5:01
 */

/* 定时器测试 */
$type = "false";
swoole_timer_after(3000,function () use ($type) {
    echo "type = $type \n";
    $type = "true";
});
echo "type = $type \n";




