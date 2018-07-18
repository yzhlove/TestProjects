<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/17
 * Time: 下午7:49
 */

// swoole chat 一個簡易的聊天室

class ChatServer
{

    public $server_;
    public $config_;
    public static $worker_manager_;
    public $pidFile_;
    public $worker_num_;
    public $worker_id_;
    public $table_;     // 內存表

    public function __construct(array $config)
    {
        $this->server_ = new swoole_server($config['host'], $config['port']);
        $this->config_ = $config;
        $this->serverConfig();
        $this->createTable();
        self::$worker_manager_ = &$this;
    }

    public function createTable()
    {
        $this->table_ = new swoole_table(65535);
        $this->table_->column('fd', swoole_table::TYPE_INT, 8);
        $this->table_->column('worker_id', swoole_table::TYPE_INT, 4);
        $this->table_->column('name', swoole_table::TYPE_STRING, 255);
        $this->table_->create();
    }

    public function serverConfig()
    {
        $this->server_->set($this->config_['server']);
    }

    public function start()
    {
        $this->server_->on('start', [$this, 'onStart']);
        $this->server_->on('shutDown', [$this, 'onShutDown']);
        $this->server_->on('workerStart', [$this, 'onWorkerStart']);
        $this->server_->on('workerStop', [$this, 'onWorkerStop']);
        $this->server_->on('task', [$this, 'onTask']);
        $this->server_->on('finish', [$this, 'onFinish']);
        $this->server_->on('pipeMessage', [$this, 'onPipeMessage']);
        $this->server_->on('workerError', [$this, 'onWorkerError']);
        $this->server_->on('managerStart', [$this, 'onManagerStart']);
        $this->server_->on('managerStop', [$this, 'onManagerStop']);
        $this->server_->on('connect', [$this, 'onConnect']);
        $this->server_->on('receive', [$this, 'onReceive']);
        $this->server_->on('close', [$this, 'onClose']);

        $this->server_->start();
    }

    protected function setProcessName($process_name)
    {
        if (function_exists('cli_set_process_title'))
            @cli_set_process_title($process_name);
        else
            swoole_set_process_name($process_name);
    }

    protected function isTaskProcess(swoole_server $server)
    {
        // TODO taskworker 標示當前進程是是否是task進程
        return $server->taskworker === true;
    }

    protected function getFilePath()
    {
        return __DIR__ . '/temp/master.pid';
    }

    public function onStart(swoole_server $server)
    {
        $this->setProcessName('chat_master');
        $this->pidFile_ = $this->getFilePath();
        $pid_info = [$server->master_pid, $server->manager_pid];
        file_put_contents($this->pidFile_, implode(',', $pid_info));
    }

    public function onShutDown(swoole_server $server)
    {
        echo "*** #master stop :    ***\n";
    }

    public function onWorkerStart(swoole_server $server, int $worker_id)
    {
        if ($this->isTaskProcess($server))
            $this->setProcessName('chat_task');
        else
            $this->setProcessName('chat_worker');
        $this->pidFile_ = $this->getFilePath();
        file_put_contents($this->pidFile_, ",{$worker_id}", FILE_APPEND);
    }

    public function onWorkerStop(swoole_server $server, int $worker_id)
    {
        if ($this->isTaskProcess($server))
            echo "@@@ #tasker stop : {$worker_id} @@@\n";
        else
            echo "%%% #worker stop : {$worker_id} %%%\n";
    }

    public function onTask(swoole_server $server, int $task_id, int $src_worker, $data)
    {

    }

    public function onFinish()
    {

    }

    public function onPipeMessage()
    {

    }

    public function onWorkerError()
    {
    }

    public function onManagerStart()
    {
    }

    public function onManagerStop()
    {
    }

    public function onConnect(swoole_server $server, int $fd, int $reactorId)
    {
        echo "#{$fd} has connected\n";
        $server->send($fd, 'please input you name:');
    }

    public function onReceive(swoole_server $server, int $fd, int $reatorId, string $str)
    {
        /*
         * 消息格式 name:to:message
         * */
        $change_str = str_replace(array("\r\n","\r","\n"),'',$str);
        $data = explode(':',$change_str);

        $from_name = $data[0];
        $to = $data[1];
        $message = $data[2];

        if (!$this->table_->exist($fd)) {
            foreach ($this->table_ as $row) {
                if ($row['name'] == $from_name) {
                    $server->send($fd, 'name already exists!');
                    return;
                }
            }
            $this->table_->set($fd, ['name' => $from_name, 'fd' => $fd]);
            $server->send($fd, "welcome to join chat\n");
        }
        if ($to == 'all')
            $this->sendToAllExceptionHim($server, $message, $fd);
        if (!empty($to) && !empty($message))
            $this->sendToOne($server, $message, $to);

    }

    public function onClose(swoole_server $server,int $fd,int $reactorId)
    {
        $data = $this->table_->get($fd);
        $this->table_->del($fd);
        if ($data) {
            $message =  "#{$data['name']} is level chat!\n";
            $this->sendToAllExceptionHim($server,$message,$fd);
        }
    }


    public function sendToAllExceptionHim(swoole_server $server, $message, int $fd)
    {
        foreach ($this->table_ as $row) {
            if ($row['fd'] == $fd) continue;
            $server->send($row['fd'], $message);
        }
    }

    public function sendToOne(swoole_server $server, $message, $name)
    {
        foreach ($this->table_ as $row) {
            if ($row['name'] == $name) {
                $server->send($row['fd'], $message);
                return;
            }
        }
    }

    public static function main()
    {
        self::$worker_manager_->start();
    }

}

/* ----------------- main ----------------- */
$config = [
    'server' => ['worker_num' => 2, 'task_worker_num' => 4, 'dispatch_mode' => 2],
    'host' => '0.0.0.0',
    'port' => 9501
];
$server_manager = new ChatServer($config);
ChatServer::main();
