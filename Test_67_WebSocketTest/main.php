<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/29
 * Time: 10:23 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

use WebSocket\Client;


//for ($i = 0;$i < 10 * 10000;$i++) {

//    swoole_timer_after(1,function () {
//
//    });

//    $data = json_encode($client->receive(), true);
//    var_dump($data);
//    $client->send(json_encode(['action' => 'ping'], JSON_UNESCAPED_UNICODE));
//    $data = json_decode($client->receive(), true);
//    var_dump($data);
//    $client->close(0);
//    usleep(100 * 1000);
//}

$start_time = time();

for ($i = 0;$i < 10000;$i++) {
// swoole_timer_after(1,function () {


     $client = new Client("ws://127.0.0.1:8801");
     $data = [
         'action' => 'ping',
         'status' => $i
     ];
     $value = "main.TestPing\n".json_encode($data,JSON_UNESCAPED_UNICODE);
     $client->send($value);
//     echo "receive: " . $client->receive() . "\n";

// })  ;
 echo "index = {$i} \n";
 usleep(5 * 1000);
}


$end_time = time();

echo "time : " . ($end_time - $start_time) . "\n";

// php: work + go 120
//php:work + task 122
//go:121
