<?php
/**
 * Created by PhpStorm.
 * User: yurisa
 * Date: 18-1-18
 * Time: 下午11:32
 */

/* 心跳检测 */
class TestServer {

    public $server;

    public function __construct() {

        $this->server = new swoole_server("0.0.0.0",9501);

        $this->server->set([
            "worker_num" => 2,
            "daemonize" => false,
            "max_request" => 100,
            "dispatch_mode" => 2,
            "debug_mode" => 1,
//            "heartbeat_check_interval" => 2   //链接最大允许的空闲时间
            "heartbeat_idle_time" => 5          //多少秒检查一次
        ]);


        $this->server->on("WorkerStart",[$this,"onWorkerStart"]);
        $this->server->on("connect",[$this,"onConnect"]);
        $this->server->on("receive",[$this,"onReceive"]);
        $this->server->on("close",[$this,"onClose"]);

        $this->server->start();
    }

    public function onWorkerStart(swoole_server $server,$worker_id) {

        echo "worker_id = $worker_id\n";
        if ($worker_id == 0) {

            //启动定时器检测心跳包
            $this->server->tick(5000,[$this,"close"]);
        }

    }

    public function close() {

        $fds = $this->server->heartbeat(false);
        foreach ($fds as $fd) {
            echo "timeout -> $fd \n";
            $this->server->close($fd);
        }

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

$ts = new TestServer();
