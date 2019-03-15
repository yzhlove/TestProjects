<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2019-03-15
 * Time: 16:31
 * @param array $arr
 * @param $i
 * @param $j
 */

//字符串全排列

function swapArray(array & $arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

function show(array & $arr, int $start, int $end)
{
    if ($start == $end) {
        toString($arr);
    } else {
        for ($i = $start; $i <= $end; $i++) {
            swapArray($arr, $i, $start);
            show($arr, $start + 1, $end);
            swapArray($arr, $start, $i);
        }
    }
}

function toString(array& $arr)
{
    foreach ($arr as $v) {
        echo $v;
    }
    echo PHP_EOL;
}

$arr = ['a', 'b', 'c'];
show($arr, 0, count($arr) - 1);
