<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/6
 * Time: 下午2:06
 */

// int -> string

echo chr(65);
echo ord('A');

echo "\n";

$str = ['A' => 0,'B' => 0,'C' => 0,'D' => 0];

for ($i = 0;$i < 30;$i++) {
    $number = 65 + mt_rand(0,3);
    $string = chr($number);
    $str[$string] ++ ;
    echo "$number : $string \n";

}

var_dump($str);