<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/30
 * Time: 下午7:50
 */

namespace src\utils;

class DBHelp {

    protected $config_;

    public function __construct(array& $config = array())
    {
        $this->config_ = $config;
    }


}

