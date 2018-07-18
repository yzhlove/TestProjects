<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/16
 * Time: 上午10:42
 */

// 一個簡單的tcp服務器

$server = new swoole_server("127.0.0.1",9501);

/**
 * @var $server swoole_server
 * @var $fd int 文件描述符
 *
 */
$server->on('connect',function ($server,$fd) {
    echo 'fd = ' , $fd , ' client connected';
});

/**
 * @var $server swoole_server
 * @var $fd int 文件描述符
 * @var $from_id worker_id worker進程ID
 * @var $data 接受的數據
 *
 */
$server->on('receive',function ($server,$fd,$from_id,$data) {

    echo 'server message:' , $data , "\n";
    $server->send($fd,'I Like You ' . $fd . "\n");

});

/**
 * @var $server swoole_server
 * @var $fd 文件描述符
 *
 */
$server->on('close',function ($server,$fd) {
    echo 'client close ' , $fd , "\n";
});

$server->start();
