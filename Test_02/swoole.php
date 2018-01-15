<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午8:46
 */

/* swoole测试 */



class server {

    public $server ;

    public function __construct() {

        $this->server = new swoole_server();

    }

}

