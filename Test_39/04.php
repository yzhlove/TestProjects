<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/21
 * Time: 下午7:39
 */

echo "\033[41;30mhello\033[0m\n";


function show($index,...$args) {

    $str = "\033[42;30m$index\033[0m";
    foreach ($args as $arg)
        $str .= $arg;
    echo $str;
}

function take() {
    $str = "Yes::";
    foreach (func_get_args() as $a)
        $str .= $a;
    echo $str;
}

show('Hello',"I","Love","You",1314,520);
echo "\n";
take('Hello',"I","Love","You",1314,520);