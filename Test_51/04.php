<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/31
 * Time: 下午3:10
 */


class Base {

    public function show() {
        echo 'base::show()';
    }
}

class Child extends Base {

    public function show() {
        echo 'child::show()';
    }
}


$child = new Child();
$child->show();