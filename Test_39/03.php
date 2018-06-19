<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/19
 * Time: 下午8:20
 */


class Test_PHP_7 {

    public function test(int $tag) : string  {
        return md5($tag);
    }

}

$ts = new Test_PHP_7();
var_dump($ts->test(128));