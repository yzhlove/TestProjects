<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/10
 * Time: 上午11:04
 */


$send_at = strtotime("0");

echo  15 - intval((time() - $send_at) / (3600 * 24));


echo "\n";

$str = "123456";
echo strlen($str);