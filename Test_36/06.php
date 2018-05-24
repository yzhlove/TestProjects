<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/18
 * Time: 下午4:14
 */

# 检查一个类的方法是否存在

class ClazzTest {

    public function getUserId() {

    }

    public function getFd() {

    }

    public function __call($name, $arguments)
    {

    }

}

$ct = new ClazzTest();
echo method_exists($ct,'getUserId');
echo "\n";

echo method_exists($ct,'getfd');
echo "\n";

echo method_exists($ct,'getOtherId');
echo "\n";