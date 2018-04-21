<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/17
 * Time: 下午8:02
 */

$array = ['1' => 'i','2' => 'love','3' => 'you'];

$result = array_search('love',$array);
echo "result = " . $result;

echo "--------------------\n";

$array = ["love","xjj"];

echo   implode(' and ',$array);

echo "--------------------\n";

$num = 0;
$str = "0";

if ($num)
    echo "num yes!";

if ($str)
    echo "str yes";

if ($num == $str)
    echo "num_str yes";
