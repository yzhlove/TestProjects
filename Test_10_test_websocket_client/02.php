<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午2:25
 */

/* swoole web_socket  服务器 */

$ws = new swoole_websocket_server("0.0.0.0", 9501);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
//    var_dump($request->fd, $request->get, $request->server);
//    $ws->push($request->fd, "hello, welcome\n");
    echo "client-{$request->fd} connect successful!";
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();