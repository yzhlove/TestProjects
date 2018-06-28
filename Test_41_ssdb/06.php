<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 下午10:02
 */

# list操作


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

try{
    $ssdb = new SimpleSSDB('127.0.0.1',8888);
}catch (SSDBException $e) {
    $e->getMessage();
}

# -- 列表操作


