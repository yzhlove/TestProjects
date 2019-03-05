<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2019-03-05
 * Time: 19:49
 */


$arr = [
    ["1", "a"],
    ["1.1", "b"],
    ["1.1.1", "ab"],
    ["1.2", "c"],
    ["1.2.1", "ac"],
    ["1.2.1.1", "ac1"],
    ["1.2.1.2", "ac2"],
    ["2", "b"],
    ["2.1", "b"],
    ["2.1.1", "bb"]
];

function show(array $a)
{
    $temp = [];
    $current = [];
    $map = [];
    $index = 0;
    foreach ($a as $key => $v) {
        $values = explode(".",$v[0]);
        $length = count($values) ;
        $map["{$length}"] = $v[1];
        if ($length % 2 == 0) {
            $last = $map[$length - 1];
            array_push($current[$last],[$v[1]]);

        } else {

            $current[$last] = $v[1];

        }



    }
    print_r($map);
}

show($arr);

