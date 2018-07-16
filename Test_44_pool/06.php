<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/13
 * Time: 下午9:20
 */

// 協程比較

$n = 4;

for ($i = 0;$i < $n;$i++) {
    sleep(1);
    echo microtime(true);
}

