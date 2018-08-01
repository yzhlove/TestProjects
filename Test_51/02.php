<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/26
 * Time: 下午1:42
 */

trait Mode_Test_One {

    private $string_;

    private function __construct(string $str)
    {
        $this->string_ = $str;
    }



    public function show() {
        echo $this->id_ . ':' . $this->string_ . "\n";
    }

}


class Test_One {

    use Mode_Test_One;

    private $id_;

    public function __construct($id)
    {
        $this->id_ = $id;
    }

}