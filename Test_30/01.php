<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/11
 * Time: 下午2:16
 */

# list 测试
define('ERROR_CODE_FAIL',-1);
define('ERROR_CODE_SUCCESS',0);

$opts = [ERROR_CODE_FAIL,'hello',['yzh' => 'love xjj']];

list($err_code,$error_reason) = $opts;

echo $err_code . ':' . $error_reason;
echo "\n";

list($err_code,$error_reason,$arr) = $opts;

echo $err_code . ':' . $error_reason . ':' . $arr['yzh'];

list($code,$reason,$arr,$what) = $opts;
echo "\n";
echo "|{$code},{$reason}|";
