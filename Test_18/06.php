<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/1
 * Time: 下午7:58
 */
/* 字符串搜索 */
$str = "123";
$value = "123456";

if (strchr($value,$str)) {
    echo "yes";
} else {
    echo "no";
}
