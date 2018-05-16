<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/12
 * Time: 上午11:53
 */

function get($string) {

    $res = explode('_',$string);
    $str = '';
    foreach ($res as $value) {
        $str .= ucfirst($value);
    }
    return $str;
}

$str1 = 'hello_world';
$str2 = 'index';

echo get($str1);
echo "\n";
echo get($str2);

echo "=============================\n";

echo microtime();

echo "=============================\n";

list($usec,$sec) = explode(' ',microtime());
echo date('Y-m-d H:i:s') . ltrim($usec,'0');

echo "\n=============================\n";

if (function_exists('com_create_guid'))
    echo com_create_guid();
else
    echo 'nonono....';

