<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/16
 * Time: 上午11:09
 */

// php 客戶端

$client = new swoole_client(SWOOLE_SOCK_TCP);

if (!$client->connect('127.0.0.1',9501,-1)) {
    exit('connect failed!'. $client->errCode);
}

$client->send('Hello World');
echo $client->recv();
$client->close();