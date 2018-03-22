<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/22
 * Time: 下午3:47
 */

$exp = [];
$abc = [];
$win_exp = 4;
for ($i = 0;$i <= 100;$i++) {
    if ($i <= 5)
        $win_exp = 4;
    elseif ($i > 5 && $i <= 10)
        $win_exp = 6;
    elseif ($i > 10 && $i <= 15)
        $win_exp = 8;
    else
        $win_exp = 10;
    $exp[] = $win_exp;
    $abc[] = $win_exp >> 1;
}

print_r($exp);
print_r($abc);