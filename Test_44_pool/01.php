<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/12
 * Time: 下午5:36
 */

// swoole 進程池

$work_num = 1;

$pool = new Swoole\Process\Pool($work_num);

$pool->on('WorkerStart',function ($pool,$worker_id) {

    for ($i = 0;$i <= 10;$i++) {
        echo "work_id = {$worker_id} : " . $i . "\n";
        if ($i == 10)
            exit(0);
        sleep(2);
    }

});

$pool->on('WorkerStop',function ($pool,$worker_id) {
    echo 'worker_stop_' . $worker_id . "\n";
});

$pool->start();