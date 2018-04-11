<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/11
 * Time: 下午5:24
 */

# php 对象测试

class A {

    protected $a;
    protected $b;

    public function __construct($one,$two = 1)
    {
        $this->a = $one;
        $this->b = $two;
        echo "{$one} and {$two} \n";
    }

    public function show() {
        echo "{$this->a} | {$this->b} \n";
    }

}

class B extends A {



}

$bb = new B(2);
$bb->show();