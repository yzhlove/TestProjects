<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/1
 * Time: 下午5:25
 */

// php 7.2 新特性

function testReturn(?string $str): ?string
{
    return $str;
}


var_dump(testReturn("12345"));
var_dump(testReturn(null));
//var_dump(testReturn()); //error



