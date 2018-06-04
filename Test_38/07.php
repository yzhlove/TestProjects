<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/4
 * Time: 下午7:24
 */

class TParent {

    public function __construct()
    {
        $this->init();
    }

    public function init() {
        echo "parent::init";
    }

}

class TChild extends TParent {

    public function init()
    {
        echo "child::init";
    }

}

$child = new TChild();
