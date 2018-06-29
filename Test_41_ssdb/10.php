<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/29
 * Time: 下午3:18
 */

trait ATT {
    public function someFun() {
        echo 'A::someFun';
    }
    public function otherFun() {
        echo 'A::otherFun';
    }
}

trait BTT {
    public function someFun() {
        echo 'B::someFun';
    }
    public function otherFun() {
        echo 'B::otherFun';
    }
}

class MyClass {

    use ATT,BTT {
        ATT::someFun insteadof BTT; // 使用A的someFun而不使用B的someFun
        BTT::otherFun as diffFun;// 为B的otherFun取别名
        BTT::otherFun insteadof ATT;
    }

}

$my_class = new MyClass();
$my_class->someFun();
$my_class->otherFun();
$my_class->diffFun();
