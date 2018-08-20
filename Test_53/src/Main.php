<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/18
 * Time: 下午5:46
 */

namespace src;

require_once "After.php";
require_once "Tick.php";
require_once "TimerManager.php";
require_once "TimerTest.php";

$timeTest = new TimerTest();
$timeTest->testAfter(new class extends TimerManager {
    public function after()
    {
        echo " < after >";
    }
});


