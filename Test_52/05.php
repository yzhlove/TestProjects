<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/16
 * Time: 下午2:07
 */

static $index = 0;
$timer_id = 0;
$timer_id = swoole_timer_tick(3 * 1000,function ($id,$param) use ($index) {

    while (++$index < 10) {
        echo 'index = ' . $index . "\n";
        sleep(1);
    }
    swoole_timer_clear($id);

},$timer_id);