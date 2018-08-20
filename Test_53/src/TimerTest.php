<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/18
 * Time: 下午5:49
 */
namespace src;

class TimerTest {

    public function testAfter(TimerManager $timerManager) {
        $timerManager->after();
    }

    public function testTick(TimerManager $timerManager) {
        $timerManager->tick();
    }

}