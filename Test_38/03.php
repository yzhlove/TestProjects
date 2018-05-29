<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/5/29
 * Time: 下午1:56
 */

# 定时器例子

class SwooleTest {

    public function start() {
        $tag[] = "_SWOOLE_TIMER_AFTER";
        $tag[] = "_SWOOLE_TIMER_TICK";
        swoole_timer_after(1000,[$this,"timer"],$tag);
    }

    public function timer(& $data) {
        var_dump($data);
    }

}


$st = new SwooleTest();
$st->start();
