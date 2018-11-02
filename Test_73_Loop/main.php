<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/2
 * Time: 10:06 AM
 */
/* 对比实验 */

$start_time = time();

for ($i = 0; $i < 300; $i++) {

    $index = $i;

    swoole_timer_after(mt_rand(2,5),function () use ($start_time,$index) {

        $begin_time = time();
        $temp = 0;
        for ($j = 0;$j < 10000 * 10;$j++) {
            $temp += $j;
        }
        $end_time = time();

        echo $index . " \t" . $start_time . " : " . $begin_time . " : "  . $end_time . " \t | " . ($end_time - $start_time) . " : \t" . ($end_time - $begin_time) . " : \t" . ($begin_time - $start_time) . "\n";


    });



}



