<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/5/31
 * Time: 下午8:50
 */


$arr = [];
$arr_2 = [1,2,3,4,5];

$list = array_merge($arr,$arr_2);

var_dump($list);

echo "AAA => " . $list['aaa'];