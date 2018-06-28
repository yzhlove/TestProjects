<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 上午10:56
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

# ssdb string 使用
try {
    $ssdb = new SimpleSSDB('127.0.0.1', 8888);
} catch (SSDBException $e) {
    echo $e->getMessage();
}

# -- set
$key_1 = getStrKey('1');
$ssdb->set($key_1, setStrValue('one'));
$key_value = $ssdb->get($key_1);
out($key_1, $key_value);
echoLine();
# -- setex
$key_2 = getStrKey('2');
$ssdb->setx($key_2, setStrValue('two'), 60);
$key_value = $ssdb->get($key_2);
out($key_2, $key_value);
$key_2_expire = $ssdb->ttl($key_2);
out($key_2, 'time ' . $key_2_expire);
//sleep(3);
$ssdb->setx($key_2, setStrValue('two'), 60);
$key_2_expire = $ssdb->ttl($key_2);
out($key_2, 'time ' . $key_2_expire);
echoLine();

# -- getset
$key_3 = getStrKey('2');
# 更新之前的key,返回旧值
$key_2_value = $ssdb->getset($key_3, setStrValue('three'));
out($key_3, '旧的value:' . $key_2_value);
$key_3_value = $ssdb->get($key_3);
out($key_3, '新的value:' . $key_3_value);
echoLine();

# -- del
# -- incr
# -- exists


# -- setbit
# 设置一个string指定位置的位值
$key_4 = getStrKey('4');
$ssdb->setbit($key_4, 2, 1);
$ssdb->setbit($key_4, 4, 1);
$ssdb->setbit($key_4, 6, 1);
$ssdb->setbit($key_4, 7, 1);
for ($i = 0; $i < 10; ++$i) {
    out($key_4, 'index:' . $i . '->' . $ssdb->getbit($key_4, $i));
}

$bin_integer_4321 = sprintf("%032d", decbin(4321));
$key_integer_4321 = getStrKey('bin_4321');
out('bin_integer_4321', $bin_integer_4321);
for ($i = 0; $i < strlen($bin_integer_4321); ++$i) {
    $ssdb->setbit($key_integer_4321, $i,$bin_integer_4321[$i]);
}
for ($i = 0; $i < 32; ++$i) {
    out($key_integer_4321, 'index:' ."\t". $i . '->' . $ssdb->getbit($key_integer_4321,$i));
}
out($key_integer_4321,'1的个数:' . $ssdb->countbit($key_integer_4321,0,32));
echoLine();

# -- substr
# -- strlen

$key_5 = getStrKey('5');
$ssdb->set($key_5,setStrValue('what'));
$key_5_value = $ssdb->get($key_5);
$key_5_strlen_value = $ssdb->strlen($key_5);
$key_5_substr_value = $ssdb->substr($key_5,0,10);
out($key_5,'value:' . $key_5_value . ' strlen:' . $key_5_strlen_value . ' substr:' . $key_5_substr_value);

echoLine();

# -- keys/rkeys 区间：("",""]
# "" 表示所有
$keys = $ssdb->keys("a","z",20);
foreach ($keys as $key) {
    out($key,'value:' . $ssdb->get($key));
}
echoLine();

# -- scan/rscan
$limit = 2;
$start = '';
$kvs = $ssdb->scan($start,'z',10);
var_dump($kvs);

echoLine();

#  批量操作函数
# -- multi-set
# -- multi-get
# -- multi-del





