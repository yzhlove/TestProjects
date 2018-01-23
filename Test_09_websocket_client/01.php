<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午11:50
 */

/* swoole websocket 客户端 */
//$client = new swoole_websocket_client("127.0.0.1",9501);

$client = new Swoole\Client();
if (!$client->connect()) {
    echo "connect failure!";
    return ;
}


$data = "what are you doing !";







