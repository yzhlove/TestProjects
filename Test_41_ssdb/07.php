<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/29
 * Time: 下午3:04
 */

// ssdb list数据结构使用

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


# -- qset
# -- qget
# -- qclear
# -- qfront
# -- qback
# -- qpush => qpush_back
# -- qpush_front
# -- qpop => qpop_back
# -- qpop_front


$list_key_1 = getStrKey('_list_ley_1');

for ($i = 0; $i < 10; $i++) {
    $ssdb->qset($list_key_1, $i, mt_rand(0, 100)); # 如果有数据则可以更新，如果没有则更新失败
}

$array_list = [];
for ($i = 0; $i < 10; $i++) {
    $array_list[] = $ssdb->qget($list_key_1, $i);
}
out($list_key_1, json_encode($array_list, JSON_UNESCAPED_UNICODE));
echoLine();


for ($i = 0; $i < 10; $i++) {
    $ssdb->qpush_front($list_key_1, mt_rand(0, 100));
}
$array_list = [];
for ($i = 0; $i < 10; $i++) {
    $array_list[] = $ssdb->qget($list_key_1, $i);
}
out($list_key_1, json_encode($array_list, JSON_UNESCAPED_UNICODE));
echoLine();

$length = $ssdb->qsize($list_key_1);
out($list_key_1, 'length => ' . $length);

# 查看队头元素
$top = $ssdb->qfront($list_key_1);

# 查看队尾元素
$back = $ssdb->qback($list_key_1);

out($list_key_1, 'top :' . $top . ' back : ' . $back);

echoLine();

# -- qpush_back
$list_key_2 = getStrKey('_list_key_2');
for ($i = 0; $i < 10; $i++) {
    $ssdb->qpush_back($list_key_2, mt_rand(100, 1000));
}
$back_list = [];
for ($i = 0; $i < 10; $i++) {
    $back_list[] = $ssdb->qget($list_key_2, $i);
}

out($list_key_2, json_encode($back_list, JSON_UNESCAPED_UNICODE));
echoLine();

# -- qrange 从下标0开始，取10个数
$list_map = $ssdb->qrange($list_key_2, 0, 10);
out('list_map', 'list_map:: ' . json_encode($list_map, JSON_UNESCAPED_UNICODE));
echoLine();

# -- qslice 从下标begin 到 下标 end
$list_map_2 = $ssdb->qslice($list_key_2, 0, -1);
out('list_map_2','list_map_2:: ' . json_encode($list_map_2,JSON_UNESCAPED_UNICODE));
echoLine();

# -- qtrim_front 从队列头部删除多个元素,返回被删除的元素的数量
$number = $ssdb->qtrim_front($list_key_2,3);
$list_map_2 = $ssdb->qslice($list_key_2, 0, -1);
out('list_map_2','number: '. $number .' list_map_2:: ' . json_encode($list_map_2,JSON_UNESCAPED_UNICODE));
echoLine();



# -- qtrim back 从队列尾部删除多个元素


# -- qlist
$list = $ssdb->qlist('a', 'z', 10);
out('所有的数据列表', json_encode($list, JSON_UNESCAPED_UNICODE));

echoLine();


$ssdb->qclear($list_key_1);
$ssdb->qclear($list_key_2);




