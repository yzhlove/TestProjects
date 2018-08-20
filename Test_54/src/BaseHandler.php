<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/19
 * Time: 下午11:36
 */

namespace src;

class BaseHandler {

    protected $id_;

    public function __construct($id)
    {
        $this->id_ = $id;
        $this->init($id);
    }

    public function init($id) {
        echo "BaseHandler::init -> id = " . $id . ' this->id = ' . $this->id_ . "\n";
    }

    public function show() {
        echo "id = " . $this->id_ . " :: \n";
    }

}