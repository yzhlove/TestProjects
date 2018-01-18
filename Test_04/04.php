<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午5:30
 */

/* after测试 */

class Timer {

    public $timer_id;

    public function __construct() {

        $this->timer_id = swoole_timer_after(3000,[$this,"change"],[15]);
    }
    public function change($id) {
        echo "hello { $id[0] } world";
    }

    public function getTimerId() {
        echo "Timer_Id = " . $this->timer_id;
    }
}

$timer = new Timer();
$timer->getTimerId();