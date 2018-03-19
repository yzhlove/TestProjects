<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/16
 * Time: 下午2:48
 */
/* PHP对象在函数间的传递 */

class Test {

    public $number;

}

function test1 () {
    $test = new Test();
    $test->number = 10;
    echo "test_number_1 = " . $test->number . "\n";

    test2($test);


    echo "test_number_1 = " . $test->number . "\n";
}

function test2 ($test) {

    echo "test_number_2 = " . $test->number . "\n";

    $test->number = 100;

    echo "test_number_2 = " . $test->number . "\n";

}


test1();
