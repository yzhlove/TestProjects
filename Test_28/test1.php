<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/13
 * Time: 下午1:40
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/*
测试数据格式：

[
    "arts" => ['score' => 150,'num' => 2,name => '文科'],
    "science" => ['score' => 200,'num' => 4,name => '理科']，
    ...
]

*/

$key = "result_data_storge";
if (!$redis->exists($key)) {

    $type = "arts";
    $data = ["score" => 150,"num" => 2, "name" => "文科","type" => "arts"];
    $result[$type] = $data;

} else {

    $result_json = $redis->get($key);
    $result = json_decode($result_json,true);
    $type = 'english';
    if (!isset($result[$type])) {
        $data = ["score" => 200,"num" => 3,"name" => "英语","type" => "english"];
        $result[$type] = $data;
    } else {
        $data = $result[$type];
        $data['score'] += 300;
        $data['num'] += 2;
        $result[$type] = $data;
    }
}
$redis->setex($key,1800,json_encode($result,JSON_UNESCAPED_UNICODE));

/*

["文科" => avg_score,"english" => avg_score]

["文科_180","英语_120"]

*/



