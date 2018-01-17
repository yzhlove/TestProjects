<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:51
 */

/* swoole_table 实践 */

class Table
{

    private $server;

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

        //增加内存表
        $this->server->table = new swoole_table(1024);
        //增加行数
         $this->server->table->column("id",\Swoole\Table::TYPE_INT);
        $this->server->table->column("string",\Swoole\Table::TYPE_STRING,256);
        //创建内存表
        $this->server->table->create();
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
        $this->server->table->set($index,["id" => $fd,"string" => $data]);
    }

    public function onClose($server, $fd)
    {
        echo "close fd = $fd \n";
    }

    public function onTask($server, $task_id, $worker_id, $data)
    {
        echo "worker_id = $worker_id | data = $data";
//        var_dump($this->table);
        echo "count = " . count($this->server->table) . "\n";
        foreach ($this->server->table as $key => $value) {
            var_dump($this->server->table->get($key));
        }
    }

    public function onFinish($server, $task_id, $data)
    {

    }

}

$ts = new Table();

