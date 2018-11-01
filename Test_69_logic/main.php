<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/1
 * Time: 10:49 AM
 */

/* 压测: 接口 */

require_once __DIR__ . '/../vendor/autoload.php';


use WebSocket\Client;


$websocket_client = new Client("ws://127.0.0.1:18000");

$login_head = "proto.Login\n";
$login_message = json_encode([
    'sid' => '110sb16fd789415701bbbf6fee4ab29bd8843a',
    'game_history_id' => '14761',
    'request_root' => 'http://test.momoyuedu.cn/',
], JSON_UNESCAPED_UNICODE);

$websocket_client->send($login_head . $login_message);
echo "login_result = " . $websocket_client->receive() . "\n";



$join_head = "proto.PINBALL\n";
$join_message = json_encode([
    'action' => 0,
], JSON_UNESCAPED_UNICODE);

$websocket_client->send($join_head . $join_message);
echo "join_result = " . $websocket_client->receive() . "\n";


$ready_head = "proto.PINBALL\n";
$ready_message = json_encode([
    'action' => 1,
],JSON_UNESCAPED_UNICODE);

$websocket_client->send($ready_head . $ready_message);
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";
echo "ready_result = " . $websocket_client->receive() . "\n";

$layer_head = "proto.PINBALL\n";
$layer_message = json_encode([
    "action" => 15,"layer" => mt_rand(1,9),
],JSON_UNESCAPED_UNICODE);
$websocket_client->send($layer_head . $layer_message);
echo "layer_result = " . $websocket_client->receive() . "\n";

$update_head = "proto.PINBALL\n";
$update_message = json_encode([
    "action" => 6 , "score" => mt_rand(0,255),
],JSON_UNESCAPED_UNICODE);

$websocket_client->send($update_head . $update_message);
echo "update_result = " . $websocket_client->receive() . "\n";


$over_head = "proto.PINBALL\n";
$over_message = json_encode([
    "action" => 7,
],JSON_UNESCAPED_UNICODE);

$websocket_client->send($over_head . $over_message);
echo "over_result = " . $websocket_client->receive() . "\n";


$leave_head = "proto.PINBALL\n";
$leave_message = json_encode([
    "action" => 5,
],JSON_UNESCAPED_UNICODE);

$websocket_client->send($leave_head . $leave_message);
echo "leave_result = " . $websocket_client->receive() . "\n";

