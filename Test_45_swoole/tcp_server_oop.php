<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/16
 * Time: 下午3:24
 */

// Tcp服務端實現

class TcpServer
{

    public $server_;
    public $config_;
    public static $worker_;
    public $pidFilePath_;
    public $work_num_;
    public $worker_id_;
    /*
     * task進程 + worker 進程 = 總服務進程
     * */
    public $task_num_;

    public function __construct(array $config)
    {
        $this->server_ = new swoole_server($config['host'], $config['port']);
        $this->config_ = $config;
        $this->serverConfig();
        self::$worker_ = &$this;
    }

    public function serverConfig()
    {
//        var_dump($this->config_);
        $this->server_->set($this->config_['server']);
    }

    public function start()
    {
        // server啟動在主進程的主線程回調此函數
        $this->server_->on('start', [$this, 'onSwooleStart']);
        // server正常結束是回調
        $this->server_->on('shutDown', [$this, 'onSwooleShutDown']);
        // 事件在worker進程/Task進程啟動的時候發生，這裡創建的進程可以在進程的生命週期內使用
        $this->server_->on('workerStart', [$this, 'onSwooleStart']);
        // 事件在worker進程終止的時候回調，次函數可以worker進程裡面申請的資源
        $this->server_->on('workerStop', [$this, 'onSwooleWorkerStop']);
        // worker 向task_worker進程投遞任務是觸發
        $this->server_->on('task', [$this, 'onSwooleTask']);
        // task進程完成task任務時觸發
        $this->server_->on('finish', [$this, 'onSwooleFinish']);
        // 工作進程收到sendMessage發送的消息時觸發，發送的管道消息會觸發OnPipeMessage事件
        $this->server_->on('pipeMessage', [$this, 'onSwoolePipeMessage']);
        // 當task/worker進程發生異常的時候觸發
        $this->server_->on('workerError', [$this, 'onSwooleWorkerError']);
        // 當管理進程啟動時調用
        $this->server_->on('managerStart', [$this, 'onSwooleManagerStart']);
        // manager_stop
        $this->server_->on('managerStop', [$this, 'onSwooleManagerStop']);
        // 當有新的連結進來時觸發
        $this->server_->on('connect', [$this, 'onSwooleConnect']);
        // 接收到數據時回調此函數
        $this->server_->on('receive', [$this, 'onSwooleReceive']);
        // TCP客戶端斷開連結之後，回調此函數
        $this->server_->on('close', [$this, 'onSwooleClose']);
        $this->server_->start();
    }

    /*
     * 服務啟動，可以存儲master_pid和manager_pid到文件中
     * 可用kill -15 master_pid發送信號給進程來關閉服務器，並且出發onShowDown
     * */
    public function onSwooleStart($server)
    {
        $this->setProcessName('SwooleMaster');
        $debug = debug_backtrace();
        $this->pidFilePath_ = __DIR__ . '/temp/' . 'tcp_server_pid.pid';
        $pid = [$server->master_pid, $server->manager_pid];
        file_put_contents($this->pidFilePath_, implode(',', $pid));
    }

    /*
     * 已關閉所有Reactor線程,HeartbeatCheck線程,UdpRecv線程
     * 已關閉所有worker進程,Task進程，User進程
     * 已close所有TCP/UDP/UnixSocket禁停端口
     * kill -9 不會回調此方法
     * kill -15 發送到主進程在會按照正常流程終止
     *
     * */
    public function onSwooleShutDown($server)
    {
        echo 'shutdown';
    }

    /*
     * 該函數具備進程隔離
     * {this} 對象從swoole_server->start 開始設置的屬性全部繼承
     * {this} 對象在 onswoolestart，onswoolemanagerstart 中設置的對象屬於不同的進程
     * pidFile雖然在swoole_start中設置，但是其進程不同，所有找不到值
     *
     *
     * */
    public function onSwooleWorkerStart(swoole_server $server, int $worker_id)
    {
        if ($this->isTaskProcess($server)) {
            $this->setProcessName('SwooleTask');
        } else {
            $this->setProcessName('SwooleWorker');
        }
        $debug = debug_backtrace();
        $this->pidFilePath_ = __DIR__ . '/temp/' . 'tcp_server_pid.pid';
        file_put_contents($this->pidFilePath_, ",{$worker_id}", FILE_APPEND);
    }


    public function onSwooleWorkerStop($server, $worker_id)
    {
        echo '#worker exited' . $worker_id . "\n";
    }

    /*
     * 該進程具有進程隔離功能
     * worker進程可以使用swooel_server_task函數向task_worker進程投遞新的任務
     * $task_id和$src_worker_id組合起來才是全局唯一的，不同的worker進程投遞任務的ID可能是相同的
     * 函數執行時遇到致命錯誤退出或者被外部進程強制kill，當前的任務會被丟棄，單是不會影響其他正在排隊的Task
     *
     * */
    public function onSwooleTask($server, $task_id, $src_worker_id, $data)
    {

    }


    public function onSwooleFinish()
    {

    }

    /*
     * 當工作進程收到由　sendMessage發送的管道消息是會觸發onPiepeMessage事件,worker/task_worker均可觸發
     *
     * */
    public function onSwoolePipeMessage($server, $src_worker_id, $message)
    {

    }

    /*
     * worker發生錯誤的錯誤處理回調
     *
     *  */
    public function onSwooleWorkerError($server, $worker_id, $worker_pid, $exit_code, $signal)
    {

    }

    public function onSwooleManagerStart()
    {
        $this->setProcessName('SwooleManager');
    }

    public function onSwooleManagerStop($server)
    {
        echo '#managerstop' . "\n";
    }

    public function setProcessName($name)
    {
        if (function_exists('cli_set_process_title'))
            @cli_set_process_title($name);
        else
            @swoole_set_process_name($name);
    }


    public function onSwooleConnect($server,$fd,$reactorId) {
        echo '#connection ' . $fd . "\n";
    }

    public function onSwooleReceive($server,$fd,$from_id,$data) {
        echo "#reveice {$from_id} to {$fd} data:" . $data . "\n";
    }

    public function onSwooleClose($server,$fd,$reactorId) {
        echo "#close fd:" . $fd . "\n";
    }


    public function isTaskProcess($server)
    {
        return $server->taskworker === true;
    }

    public static function main()
    {
        self::$worker_->start();
    }

}

$config = [
    'server' => [
        'worker_num' => 4,
        'task_worker_num' => 20,
        'dispatch_mode' => 3,
    ],
        'host' => '0.0.0.0',
        'port' => 9501
];

$tcp_server = new TcpServer($config);
$tcp_server::main();