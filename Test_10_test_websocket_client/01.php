<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午2:18
 */

/* 使用swoole_client客户端发送ws协议数据 */

require_once "WebSocketClient.php";
// WebSocketClient文件地址：https://github.com/swoole/swoole-src/blob/master/examples/websocket/WebSocketClient.php

$client = new WebSocketClient("127.0.0.1",9501);

if (!$client->connect()) {
    exit("connect failure!");
}

//发送数据
$client->send("hello web_scoket_server");

// 接收数据
$data = $client->recv();

var_dump($data);

/*
 * data的值
object(Swoole\WebSocket\Frame)#3 (3) {
  ["finish"]=>
  bool(true)
  ["opcode"]=>
  int(1)
  ["data"]=>
  string(31) "server: hello web_scoket_server"
}
*/

sleep(3);