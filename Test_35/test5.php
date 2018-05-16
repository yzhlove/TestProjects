<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/15
 * Time: 下午9:05
 */

# php 魔术方法

class PTest {

    public function __call($name, $arguments)
    {
        $prefix = substr($name, 0, 3);
        $last = substr($name, 3);

        echo $prefix . '-' . $last;

    }

}

$pt = new PTest();
$pt->setAge(1);

echo "--------------------\n";

$pt->setObject("yzh","love",1);