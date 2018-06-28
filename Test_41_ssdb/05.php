<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 下午5:26
 */
# 有序集合


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
} catch (SSDBException $e) {
    $e->getMessage();
}

# -- zset
# -- zget
# -- zdel
# -- zincr
# -- zsize
$zet_key = getStrKey('z_set_key_1');
for ($i = 0; $i < 10; $i++) {
    $weight = mt_rand(1000, 9999);
    $key = getStrKey($i);
    $ssdb->zset($zet_key, $key, $weight);
}

$collection = [];
for ($i = 0; $i < 10; $i++) {
    $temp_key = getStrKey($i);
    $collection[] = $ssdb->zget($zet_key, $temp_key);
}
out($zet_key, json_encode($collection, JSON_UNESCAPED_UNICODE));
echoLine();

$zset_key_length = $ssdb->zsize($zet_key);
out('zset_key_length', $zset_key_length);

# -- zlist
# -- zkeys
# -- zscan

$zet_key_2 = getStrKey('z_set_key_2');
for ($i = 0; $i < 10; $i++) {
    $weight = mt_rand(10000, 99999);
    $ssdb->zset($zet_key_2, 'love_' . $weight, time());
}

# 查看zset整个区间的数据
$zset_list = $ssdb->zlist('a', 'z', 20);
out('zset_collection', json_encode($zset_list, JSON_UNESCAPED_UNICODE));

echoLine();

# -- zscan
# 1.zet_key 大key
# 2. '' 为空则不指定，否则返回的key为 : result.key_score => (key.score + 1000 , 4000]
$item_1 = $ssdb->zscan($zet_key, '', 1000, 4000, 10);
out($zet_key, json_encode($item_1, JSON_UNESCAPED_UNICODE));

echoLine();

$item_2 = $ssdb->zscan($zet_key_2, '', 1, '', 10);
out($zet_key_2, json_encode($item_2, JSON_UNESCAPED_UNICODE));

echoLine();

# -- zkeys 返回的是key的集合
$result_collection = $ssdb->zkeys($zet_key, '', 1000, 8000, 10);
out($zet_key, json_encode($result_collection, JSON_UNESCAPED_UNICODE));

echoLine();

# -- zrank/zrrank 排名 [非常慢,请在离线环境中使用]
$rank_array = [];
for ($i = 1; $i <= 5; $i++) {
    $rank = $ssdb->zrank($zet_key, getStrKey($i));
    $rank_array[getStrKey($i)] = $rank;
}
out($zet_key_2, json_encode($rank_array, JSON_UNESCAPED_UNICODE));

echoLine();

# -- zrange/zrrange
$range = $ssdb->zrange($zet_key_2, 0, 10);
out($zet_key_2, json_encode($range, JSON_UNESCAPED_UNICODE));

echoLine();

# -- zclear 删除key

# -- zcount 根据 socre区间查看key的数量
$key_number = $ssdb->zcount($zet_key,2000,8000);
out($zet_key,'key_number:' . $key_number);

echoLine();

# -- zsum
# -- zavg
# -- zremrangebyrank    按排名删除
# -- zremrangebyscore   按分数删除

# -- zpop_front 从zset首部删除并返回limit个元素
$rem_top_limit = $ssdb->zpop_front($zet_key,2);
out($zet_key,json_encode($rem_top_limit,JSON_UNESCAPED_UNICODE));
echoLine();

$rem_back_limit = $ssdb->zpop_back($zet_key,2);
out($zet_key,json_encode($rem_back_limit,JSON_UNESCAPED_UNICODE));
echoLine();

# -- multi-zset
# -- multi-zget
# -- multi-zdel


















