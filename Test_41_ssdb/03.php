<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 上午11:44
 */

function one($str1, $str2)
{
    two("Glenn", "Quagmire");
}
function two($str1, $str2)
{
    three("Cleveland", "Brown");
}
function three($str1, $str2)
{
    print_r(debug_backtrace());
}

//one("Peter", "Griffin");
three('a','b');