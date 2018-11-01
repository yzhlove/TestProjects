<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/30
 * Time: 10:35 AM
 */

namespace src;

require_once "src/GameServer.php";


$config = [
    'host' => '0.0.0.0',
    'port' => 8802,
    'server' => [
        'worker_num'    => 8,
        'reactor_num'   => 2,
        'max_request'   => 10000,
        'task_worker_num' => 32,
    ]
];

$gameServer = new GameServer($config);
$gameServer->start();






