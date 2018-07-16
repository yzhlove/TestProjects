<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/13
 * Time: 下午8:49
 */

//  協程
use \Swoole\Coroutine;

go(function () {
    Co::sleep(5);
    echo "go_1 \n";
});

echo "main \n";

go(function () {
    Co::sleep(2);
    echo "go_2 \n";
});

