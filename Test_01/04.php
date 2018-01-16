<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午3:14
 */

/* JSON递归深度测试 */
$str = '{"model":"game","action":"playing","game_code":"lianliankan","data":{"room_id":1,"sid":1,"game_info":"{\"hello\":\"PHP\"}"}}';
//JSON解析为对象
$obj = json_decode($str);
var_dump($obj);

//JSON解析为数组
$obj_arr = json_decode($str,true);
var_dump($obj_arr);
echo "\n-------------------\n";

$arr = [
    "model"=>"game",
    "action"=> "playing",
    "game_code"=>"lianliankan",
    "data" => [
        "room_id" => 1,
        "sid" => 1,
        "game_info" => '{"hello":"PHP"}'
    ]
];

//Array/Object解析为json
$json = json_encode($arr);
echo $json;

echo "\n===========================\n";

$json = '{"error_code":0,"action":"playing","data":{"game_info":"{"1":"{\'level\':20,\'score\':100}","2":120}"}}';
var_dump(json_decode($json));

