<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午4:01
 */

/* null 转json 测试 */
$arr = [
    "id" => 1,
    "string" => null
];

echo json_encode($arr);
