<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/15
 * Time: 下午2:31
 */

/* json测试用例 */

$str = "{}";
$obj = json_decode($str);

if ($obj) {
    echo "json for object successful!\n";
} else {
    echo "json for object failure!\n";
}

echo "\n-----------------------\n";
$sid_1 = "1";
$sid_1_data = "i love you!";
$obj->$sid_1 = $sid_1_data;

var_dump($obj);
echo json_encode($obj);
echo "\n";

$sid_2 = "2";
$sid_2_data = "love love love!";
$obj->$sid_2 = $sid_2_data;
var_dump($obj);
echo json_encode($obj);

$obj->$sid_1 = "super love!";
echo json_encode($obj);




