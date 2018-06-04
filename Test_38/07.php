<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/4
 * Time: 下午7:24
 */

abstract class TParent {

    public function __construct()
    {

    }

    public function start() {
        $this->init();
    }

    public abstract function init() ;

}

class TChild extends TParent {

    public function __construct()
    {
        parent::__construct();
        echo "\nchild::construct";
    }

    public function init()
    {
        echo "\nchild::init";
    }

}

class CChild extends TParent {

    public function init()
    {
        // TODO: Implement init() method.
        echo "\ncchilder::init\n";
    }
}

$child = new TChild();
$child->start();

$ct = new CChild();
$ct->start();
