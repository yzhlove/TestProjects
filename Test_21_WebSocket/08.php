<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/6
 * Time: 下午3:58
 */

$max = 17054;  //17054
$rand_arr = [];
for ($i = 0;$i < 50;$i++)
    $rand_arr[] = mt_rand(0,$max);
// 去重复
$rand_arr = array_unique($rand_arr);
var_dump($rand_arr);