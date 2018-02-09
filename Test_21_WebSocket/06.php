<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/6
 * Time: 上午10:54
 */

/* 测试 */
class TestMate {

    public function test() {
        echo "hello world";
    }

}

$clazz = "Test" . "Mate";

$ts = new $clazz();
$ts->test();