<?php

$arr = [
    "model" => "game",
    "data" => [
        "action" => "playing",
        "game_info" => "{\"hello\":\"php\"}"
    ]
];

$json =  json_encode($arr);

echo "json = $json \n";

$obj = json_decode($json,true);

var_dump($obj);

$str_json_arr = [
    "model" => "game",
    "action" => "playing",
    "game_code" => "lianliankan",
    "data" => [
        "room_id" => 1,
        "sid" => "1",
        "game_info" => '{"level:2,"score":100"}'
    ]
];

echo json_encode($str_json_arr);

echo "\n\n";

$test = '{"model":"game","action":"playing","game_code":"lianliankan","data":{"room_id":1,"sid":"1","game_info":"{\"level\":2,\"score\":100}"}}';
var_dump(json_decode($test));

echo "\n------------------------\n";

$test_2 = '{"error_code":0,"action":"playing","data":{"game_info":"{\"1\":\"{\"level\":2,\"score\":100}\",\"2\":120}"}}';
var_dump(json_decode($test_2,true));

$game_info = "what are you doing ... \n";
var_dump(json_encode($game_info));
