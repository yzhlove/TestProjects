<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/9
 * Time: 下午8:46
 */

class TestTimer {

    public static $timer = 10;
    public $timer_id;

    public function go() {
        $this->timer_id = swoole_timer_tick(1 * 1000,function () {
            if (self::$timer == 0) {
                echo "timeout :\n";
                swoole_timer_clear($this->timer_id);
                return ;
            }
            -- self::$timer;
            echo "timer = " . self::$timer . "\n";
        });

    }
}


$tt = new TestTimer();
$tt->go();




