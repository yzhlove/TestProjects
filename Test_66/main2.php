<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/10
 * Time: 上午11:35
 */



function add() {

    return function () {
        echo "what are you doing.";
    };
}



$test = add();

$test();
