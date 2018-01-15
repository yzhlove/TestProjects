<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午2:42
 */

/* JSON测试用例 Array测试 */

$str = "{}";
$obj_arr = json_decode($str,true);
if (is_array($obj_arr)) {
    echo "to Array successful!\n";
} else {
    echo "to Array failure!\n";
}
$sid = "1";
$sid_data = "temp_data";
$obj_arr[$sid] = $sid_data;

var_dump($obj_arr);
$obj_arr[$sid] = "what are you doing";
echo json_encode($obj_arr);
