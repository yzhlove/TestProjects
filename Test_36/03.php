<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/16
 * Time: 下午8:53
 */

$one = "I";
$two = "Love";
$three = "Xjj";

foreach (['one','two','three'] as $value)
    $opts[$value] = $$value;

var_dump($opts);