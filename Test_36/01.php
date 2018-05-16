<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/15
 * Time: 下午9:20
 */

#  驼峰相互转换

function camelize($string ,$operator = '_') {

    $string = strtolower($string);
    $string = str_replace($operator,' ',$string);
    $string = ucwords($string);
    return str_replace(' ','',$string);
}

function uncamelize($string ,$operator = '_' ) {
    $string = preg_replace('/([a-z])([A-Z])/',"$1" .  $operator . "$2",$string);
    return strtolower($string);
}

function laraval_uccamelize($string ,$operator = '_') {
    $string = preg_replace('~(?<=\\w)([A-Z])~',"$1" .  $operator . "$2",$string);
    return strtolower($string);
}

echo camelize("str") . "\n";
echo camelize("str_str") . "\n";

echo "------------------\n";

echo uncamelize("Str") . "\n";
echo uncamelize("StrStr") . "\n";
echo uncamelize("STr") . "\n";
echo uncamelize("STR") . "\n";
echo uncamelize("STrSTr") . "\n";

echo "------------------\n";

echo laraval_uccamelize("Str") . "\n";
echo laraval_uccamelize("StrStr") . "\n";
echo laraval_uccamelize("STr") . "\n";
echo laraval_uccamelize("STR") . "\n";
echo laraval_uccamelize("STrSTr") . "\n";
