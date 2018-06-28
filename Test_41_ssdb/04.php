<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 下午2:52
 */

function getStrKey($tag)
{
    return 'yzh_string_key_' . $tag;
}

function setStrValue($value)
{
    return 'yzh_string_value_' . $value;
}

function out($key, $info)
{
    $debug_info = debug_backtrace();
    echo '[' . date('Y-m-d H:i:s') . ' line:' . $debug_info[0]['line'] . ']' . $key . ':' . $info . "\n";
}

function echoLine()
{
    echo "\n * ------------------------------------ * \n";
}

try {
    $ssdb = new SimpleSSDB('127.0.0.1', 8888);
} catch (Exception $e) {
    echo $e->getMessage();
}

# -- hset
# -- hget
# -- hdel
# -- hexists


$hash_map_key_1 = getStrKey('hash_map_1');
$peopel_1 = ['name' => 'xjj', 'birthday' => '1996-05-23'];
foreach ($peopel_1 as $type => $value) {
    $ssdb->hset($hash_map_key_1, $hash_map_key_1 . $type, $value);
}
foreach ($peopel_1 as $type => $value) {
    $people_1_value = $ssdb->hget($hash_map_key_1, $hash_map_key_1 . $type);
    out($hash_map_key_1, ' value:' . $people_1_value);
}

$peopel_1_array = $ssdb->hgetall($hash_map_key_1);
out($hash_map_key_1, json_encode($peopel_1_array, JSON_UNESCAPED_UNICODE));

echoLine();

$peoples = [
    'hash_map_key_2' => ['name' => 'yzh', 'birthday' => '1996-12-24'],
    'hash_map_key_3' => ['name' => 'xyj', 'birthday' => '1996-07-13']
];

$hash_map_key_2 = getStrKey('hash_map_2');
$hash_map_key_3 = getStrKey('hash_map_3');

foreach ($peoples as $key => $value) {
    $key = $$key;
    $ssdb->multi_hset($key, $value);
}
$begin = 2;
for ($i = 2; $i <= 3; ++$i) {
    $tp_key = 'hash_map_key_' . $i;
    $hash_map_key = $$tp_key;
    $obj_arr = $ssdb->multi_hget($hash_map_key,['name','birthday']);
    out($hash_map_key,json_encode($obj_arr,JSON_UNESCAPED_UNICODE));
}

for ($i = 2; $i <= 3; ++$i) {
    $tp_key = 'hash_map_key_' . $i;
    $hash_map_key = $$tp_key;
    $obj_arr = $ssdb->hgetall($hash_map_key);
    out($hash_map_key,json_encode($obj_arr,JSON_UNESCAPED_UNICODE));
}

echoLine();

# -- hexists
# -- hsize
# -- hlist/hrlist
# -- hkeys

# 检查一个hashMap里面有多少个元素
$hash_map_key_2_size = $ssdb->hsize($hash_map_key_1);
out($hash_map_key_2,'keys :'. $hash_map_key_2_size);

echoLine();

# hkeys 到一个hashmap里面按照'a'-'z'去查找数据，返回key
$hkey_1_list = $ssdb->hkeys($hash_map_key_1,'','z',10);
out($hash_map_key_1,json_encode($hkey_1_list));

echoLine();

# -- hclear 删除一个key里面的所有数据,包括key本身
$del_keys = $ssdb->hclear($hash_map_key_2);
out($hash_map_key_2,'del_key_number:' . $del_keys);

echoLine();

# -- hscan






































