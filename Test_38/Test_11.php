<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/7
 * Time: 上午9:53
 */
/*
 * 定时器嵌套
 * */


$id = swoole_timer_after(1000,function () {

    echo "timer_id = "  . "\n";
    $td = swoole_timer_after(1500,function () {

        echo "after_timer_id = "  . "\n";

    });

    echo "td = " . $td . "\n";

});

echo "id = " . $id . "\n";



