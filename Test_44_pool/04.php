<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/13
 * Time: 下午8:35
 */

// 協程初體驗2


use \Swoole\Coroutine;

go(function () {
    Co::sleep(10);
    echo "Hello go \n";
});

go(function () {
    Co::sleep(5);
    echo "Hello go2 \n";
});

echo "china ... php \n";