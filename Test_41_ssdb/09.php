<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/29
 * Time: 下午3:04
 */

// php trait关键字的使用

//trait 使用复制的方式，故与extends不同，trait可以在函数内部使用"private"方法

function echoLine()
{
    echo "\n * ------------------------------------ * \n";
}

trait Log {

    public function startLog() {
        echo 'start_log ';
    }

    public function stopLog() {
        echo 'stop_log ';
    }

    private function standerLog() {
        echo 'stander_log ';
    }

}


class RetailStore {
    use Log;

    public function standLog() {
        $this->standerLog();
    }

}

class Car {
    use Log;
}

$retail_store = new RetailStore();
$retail_store->startLog();
$retail_store->stopLog();
$retail_store->standLog();

echoLine();

$car = new Car();
$car->stopLog();
$car->startLog();
