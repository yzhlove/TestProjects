<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/16
 * Time: 下午2:52
 */

function arr_test_1 () {

    $arr = ["number" => 10];
    echo "arr_number_1 = " . $arr['number'] . "\n";
    arr_test_2($arr);
    echo "arr_number_1 = " . $arr['number'] . "\n";
    arr_test_3($arr);
    echo "arr_number_1 = " . $arr['number'] . "\n";

}

function arr_test_2 ($arr) {

    echo "arr_number_2 = " . $arr['number'] . "\n";
    $arr['number'] = 20;
    echo "arr_number_2 = " . $arr['number'] . "\n";

}

function arr_test_3 (&$arr) {
    echo "arr_number_3 = " . $arr['number'] . "\n";
    $arr['number'] = 40;
    echo "arr_number_3 = " . $arr['number'] . "\n";

}

arr_test_1();