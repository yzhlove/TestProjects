<?php
/**
 * Created by PhpStorm.
 * User: yurisa
 * Date: 18-1-18
 * Time: 下午11:13
 */

/* swoole 心跳测试 */
class Timer_Server {

    private $server;

    public function __construct() {

        $this->server = new swoole_server("0.0.0.0",9501);

        $this->server->set([
            "worker_num" => 2,
            "dispatch_mode" => 2,
            "max_request" => 100,
            "debug_mode" => 1,
            "deamonize" => false,
            "heartbeat_idle_time" => 5,       //多少秒无响应则断开链接
            "heartbeat_check_interval" => 1    //多少秒便利一次链接
        ]);

        $this->server->on("WorkerStart",[$this,"onWorkerStart"]);
        $this->server->on("connect",[$this,"onConnect"]);
        $this->server->on("receive",[$this,"onReceive"]);
        $this->server->on("close",[$this,"onClose"]);

        $this->server->start();
    }

    public function onWorkerStart(swoole_server $server,$worker_id) {

        echo "worker_id = $worker_id\n";

    }

    public function onConnect(swoole_server $server,$fd) {

        echo "connect fd = $fd \n";

    }

    public function onReceive(swoole_server $server,$fd,$reactor_id,$data) {
        echo "fd = $fd | data = $data ";
    }

    public function onClose(swoole_server $server,$fd) {

        echo "disconnect $fd \n";

    }


}


$sevr = new Timer_Server();


