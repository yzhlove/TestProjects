<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/1
 * Time: 3:27 PM
 */

/* 压力测试  * 登陆接口 */

require_once __DIR__ . '/../vendor/autoload.php';

use WebSocket\Client;

$start_time = time();

static $index = 0;
for ($i = 0;$i < 5000;$i++) {

//    swoole_timer_after(1,function () use ($i) {

        $websocket_client = new Client("wss://gotestw.yueyuewo.cn");

        $login_head = "proto.Login\n";
        $login_message = json_encode([
            'sid' => '110sb16fd789415701bbbf6fee4ab29bd8843a',
            'game_history_id' => '14761',
            'request_root' => 'http://test.momoyuedu.cn/',
        ], JSON_UNESCAPED_UNICODE);

        $websocket_client->send($login_head . $login_message);
//        echo "login_result [{$i}] = " . $websocket_client->receive() . "\n";

//    });


}


$end_time = time();
echo "time = " . ($end_time - $start_time);

//487s
//平均一个登陆请求处理时长 980ms