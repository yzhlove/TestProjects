<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/23
 * Time: 下午3:23
 * @param array $arr
 */

function test(array $arr) {
    foreach ($arr as $row) {
        foreach ($row as $colum) {
            echo $colum ;
        }
        echo "\n";
    }
}


$arr = [
  [1,3,5],
  [2,4,6],
  [7,8,9]
];

test($arr);