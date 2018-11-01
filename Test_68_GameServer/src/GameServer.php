<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/30
 * Time: 10:36 AM
 */


namespace src;

class GameServer
{

    protected $configure_;
    protected $server_;

    public function __construct(array $configure)
    {
        $this->configure_ = $configure;

    }

    public function start()
    {
        $this->server_ = new \swoole_websocket_server($this->configure_['host'], $this->configure_['port']);
        $this->server_->set($this->configure_['server']);
        $this->server_->on('open', [$this, 'onOpen']);
        $this->server_->on('message', [$this, 'onMessage']);
        $this->server_->on('close', [$this, 'onClose']);
        $this->server_->on('task', [$this, 'onTask']);
        $this->server_->on('finish', [$this, 'onFinish']);
        $this->server_->start();
    }


    // 连接开始
    public function onOpen($server, $request)
    {
        $fd = $request->fd;
        echo "open_fd = {$fd} \n";
    }


    // 连接关闭
    public function onClose($server, $fd, $reactor_id)
    {
        echo "close_fd = {$fd} \n";
    }

    // 收发消息
    public function onMessage($server, $frame)
    {
        go(function () use ($server,$frame) {
            $fd = $frame->fd;
            $message = $frame->data;
            echo "fd = {$fd} \n";
            $split_message = explode("\n", $message);
            $ping_message = json_decode($split_message[1], true);
            $ping_message['status'] += 1;
//        echo "push_message fd:{$fd} , message:" . json_encode($ping_message,JSON_UNESCAPED_UNICODE);
            $server->push($fd, json_encode($ping_message, JSON_UNESCAPED_UNICODE));
        });

//        $server->task($frame);

    }


    // task
    public function onTask($server, $task_id, $worker_id, $data)
    {


        $fd = $data->fd;
        $message = $data->data;
        echo "fd = {$fd} \n";
        $split_message = explode("\n", $message);
        $ping_message = json_decode($split_message[1], true);
        $ping_message['status'] += 1;
//        echo "push_message fd:{$fd} , message:" . json_encode($ping_message,JSON_UNESCAPED_UNICODE);
        $server->push($fd, json_encode($ping_message, JSON_UNESCAPED_UNICODE));


        return true;

    }

    //
    public function onFinish($server, $task_id, $data)
    {

    }


}