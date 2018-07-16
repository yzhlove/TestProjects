<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/12
 * Time: 下午7:52
 */

$work_num = 3;

$pool = new Swoole\Process\Pool($work_num);

$pool->on('WorkerStart',function ($pool,$workerId) {
    $running = true;
    pcntl_signal(SIGTERM,function () use (& $running) {
        $running = false;
        $pid = posix_getpid();
        $ppid = posix_getppid();
        posix_kill($ppid,SIGTERM);
        echo "pid = {$pid} , ppid = {$ppid} \n";
    });

    $index = 1;
    while ($running) {
        pcntl_signal_dispatch();
        echo "index = {$index} \n";
        ++ $index;
        sleep(5);
    }
});

$pool->start();