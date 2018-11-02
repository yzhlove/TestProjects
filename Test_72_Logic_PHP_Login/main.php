<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/1
 * Time: 8:03 PM
 */

/* php接口 登陆测试 */

require_once __DIR__ . '/../vendor/autoload.php';

use WebSocket\Client;




$head = "wss://gwtest.yueyuewo.cn/";
//$head = "ws://127.0.0.1:9601";
$urls = [
    'game_history_id' => 14761,
    'code' => 'yuewan',
    'request_root' => 'http://test.momoyuedu.cn/',
    'game_code' => 'cheil',
    'sid' => '110sb16fd789415701bbbf6fee4ab29bd8843a',
];

$string_url = "";
foreach ($urls as $key => $value) {
    $string_url .= "{$key}={$value}&";
}

$socket_url = $head . '?' . $string_url;

echo "socket_url = " . $socket_url . "\n";

$start_time = time();

for ($i = 0;$i < 5000;$i++) {

    $websocket_client = new Client($socket_url);

    $ready_data = [
        "action" => "ready",
        "data" => []
    ];
    $websocket_client->send(json_encode($ready_data, JSON_UNESCAPED_UNICODE));

    echo $i . "\n";

}


$end_time = time();

echo "time = " . ($end_time - $start_time);


