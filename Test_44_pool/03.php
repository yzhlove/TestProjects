<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/13
 * Time: 下午8:29
 */

// swoole協程初體驗

go(function () {
    echo "hello go1";
});

echo "Hello body!";

go(function () {
    echo "hello go2";
});