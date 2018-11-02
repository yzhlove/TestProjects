<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/1
 * Time: 5:00 PM
 */

require_once __DIR__ . "/../vendor/autoload.php";

use WebSocket\Client;

//PHP业务测试

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
echo 'start_time  = ' . $start_time . "\n";

for ($i = 0;$i < 100;$i++) {

    $temp = $i;

    swoole_timer_after(mt_rand(2,5),function () use ($socket_url,$temp,$start_time) {

        $begin_time = time();

        $websocket_client = new Client($socket_url);

        $ready_data = [
            "action" => "ready",
            "data" => []
        ];
        $websocket_client->send(json_encode($ready_data, JSON_UNESCAPED_UNICODE));
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";

        for ($j = 0;$j < 100;$j++) {

            $boast_score_data = [
                "action" => "boast_score",
                "data" => [
                    "score" => mt_rand(100, 1000),
                ],
            ];
            $websocket_client->send(json_encode($boast_score_data, JSON_UNESCAPED_UNICODE));
//    echo "==> " . $websocket_client->receive() . "\n";

        }

        $result_data = [
            "action" => "result",
            "data" => [
                "winner_id" => 110
            ]
        ];
        $websocket_client->send(json_encode($ready_data, JSON_UNESCAPED_UNICODE));
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";
//    echo "==> " . $websocket_client->receive() . "\n";

       $end_time = time();
       echo $temp . "\t" . $start_time . ' : ' . $begin_time . ' : ' . $end_time . ' | ' . ($end_time - $start_time) . "\t : " . ($end_time - $begin_time) ." \t : ". ($begin_time - $start_time) ."\n";

    });




}


//$end_time = time();

//echo "time = " . ($end_time - $start_time);


// 测试环境:
/*

php:32

10c * 50

S:4 F:6

sleep: >=60s

 */




