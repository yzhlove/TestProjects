<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/18
 * Time: 下午5:47
 */

namespace src;

abstract class TimerManager implements After ,Tick {

    public function after()
    {
        echo "TimeManager::after";
    }

    public function tick()
    {
        echo "TimeManager::tick";
    }
}