<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/1
 * Time: 下午5:28
 */

class Foo {
    public function bar() : void {

    }
}

class FooBor extends Foo {
    // 当使用强制类型之后父类呵子类返回的类型必须一致
    public function bar(): void
    {

    }
}

