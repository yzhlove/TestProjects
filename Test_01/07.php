<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午5:04
 */

/* json测试 */
$str = '{"model":"game","action":"playing","game_code":"lianliankan","data":{"room_id":1,"sid":1,"game_info":{"level":2,"score":100}}}';

//var_dump(json_decode($str));

//var_dump(json_decode($str,true));

$obj = json_decode($str);
var_dump($obj);

echo "\n---------------\n";
$json = json_encode($obj->data->game_info);

var_dump($obj->data->game_info);
echo "\n---------------\n";


var_dump($json);
echo "json = $json \n";

$db = [
  "1" => $json
];

var_dump($db);
echo "\n---------------\n";

var_dump(json_encode($db));

$json_db = json_encode($db);

//解析

$obj = json_decode($json_db);
echo "\n---------------\n";

var_dump($obj);

echo "\n---------------\n";
//再次解析
$str = "1";
$obj_sid = json_decode($obj->$str);

var_dump($obj_sid);

