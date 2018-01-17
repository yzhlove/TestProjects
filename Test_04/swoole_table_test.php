<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午3:49
 */

/* 内存表测试 */
class Test_Server {

    public $server;
    public $table;

    public function __construct()
    {
        $this->server = new swoole_server("0.0.0.0", 9502);
        $this->server->set([
            'worker_num' => 2,
            'reactor_num' => 2,
            'daemonize' => false,
            'max_request' => 100,
            'dispatch_mode' => 2,
            'debug_mode' => 1,
            'task_worker_num' => 4,
            'reactor_num' => 4
        ]);
        $this->server->on("WorkerStart", [$this, "onWorkerStart"]);
        $this->server->on("connect", [$this, "onConnect"]);
        $this->server->on("receive", [$this, "onReceive"]);
        $this->server->on("close", [$this, "onClose"]);
        $this->server->on("task", [$this, "onTask"]);
        $this->server->on("finish", [$this, "onFinish"]);

        //使用内存表
        $this->table = new swoole_table(1024);
        $this->table->column("id",\Swoole\Table::TYPE_INT);
        $this->table->column("string",\Swoole\Table::TYPE_STRING,256);
        $this->table->create();

        //开启服务
        $this->server->start();
    }

    public function onWorkerStart($server, $worker_id)
    {
        echo "worker_id = $worker_id \n";
    }

    public function onConnect($server, $fd)
    {
        echo "connect fd = $fd \n";
    }

    public function onReceive($server, $fd, $reactor_id, $data)
    {
        echo "data = $data";
        if (strpos($data, "task") > -1) {
            $this->server->task($data);
        }

        $index = time();
        $this->table->set($index,["id" => $fd,"string" => $data]);
    }

    public function onClose($server, $fd)
    {
        echo "close fd = $fd \n";
    }

    public function onTask($server, $task_id, $worker_id, $data)
    {
        echo "worker_id = $worker_id | data = $data";
//        var_dump($this->table);
        echo "count = " . count($this->table) . "\n";
        foreach ($this->table as $key => $value) {
            var_dump($this->table->get($key));
        }
    }

    public function onFinish($server, $task_id, $data)
    {

    }

}


$test_sever = new Test_Server();

