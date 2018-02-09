<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/5
 * Time: 下午9:48
 */
/* swoole 进程使用 */

function doProcess(swoole_process $worker) {

    $a = swoole_timer_after(2000,function () {
       echo "hello world";
    });
    echo "a = $a \n";
}

for ($i = 0;$i < 5;$i++) {

    $process = new swoole_process("doProcess");
    $pid = $process->start();
    echo "process_pid = " . $pid . "\n";
}

swoole_process::wait();