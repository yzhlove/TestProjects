<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 下午4:31
 */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/* HyperLogLog 基数操作 */
// 向hyperh中添加元素
$status = $redis->pfAdd("temp_test",[1,2,4,5,7,9]);
echo "status = $status \n";

$arr = [];
for ($i = 0;$i < 100 * 10000;$i++) {
//    echo "i = $i \n";
    $number = mt_rand(0,1000 * 10000);
    $arr[] = $number;
}

$arr2 = [];
for ($i = 0;$i < 100 * 10000;$i++) {
//    echo "i = $i \n";
    $number = mt_rand(0,1000 * 10000);
    $arr2[] = $number;
}
//添加
$status = $redis->pfAdd("temp_test",$arr);
if (!$status) {
    echo "add is failure!";
}

$status = $redis->pfAdd("test_temp",$arr2);
if (!$status) {
    echo "add is failure!";
}

//查看
$count = $redis->pfCount("temp_test");
echo "count = $count \n";
$count = $redis->pfCount("test_temp");
echo "count = $count \n";

//合并
$status = $redis->pfMerge("user_count",["temp_test","test_temp"]);
echo "status = $status \n";

echo "user_count = " .$redis->pfCount("user_count");


$redis->expire("temp_test",1);


