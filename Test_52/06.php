<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/16
 * Time: 下午2:14
 */
static $index = 10;

function tt($index) {
    if ($index == 0)
        return ;
    swoole_timer_after(2 * 1000,function ()  use ($index) {
        $index -= 1;
        echo "index = " . $index . "\n";
        tt($index);
    });
}


tt($index);