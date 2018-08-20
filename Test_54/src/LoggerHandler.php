<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/19
 * Time: 下午11:38
 */

namespace src;

class LoggerHandler extends BaseHandler {

    protected $server_code_;

    public function __construct($id,$server_code)
    {

        $this->server_code_ = $server_code;
        parent::__construct($id);
        $this->init($id);
    }

    public function init($id)
    {
        $this->id_ = $id;
        echo "LoggerHandler :: id = " . $this->id_ .  " server_code = " . $this->server_code_ . "\n";
    }

}