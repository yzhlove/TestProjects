<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 上午10:37
 */


$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//redis 渐进式遍历
/*
 * scan 使用
 * iterator -> 迭代器
 * pattern  -> 模式匹配
 * count    -> 每次遍历的条数，默认为10
 * */

// redis 中所有key的数量
$count = $redis->dbSize();
echo "count=  $count \n";

$length = 0;
$iterator = null;   //scan  传入的是一个迭代器对象的引用
do {
    $iterator_data = $redis->scan($iterator);
    if ($iterator_data != false) {
        foreach ($iterator_data as $value) {
            echo "key = $value \n";
            $length++;
        }
    }
    echo "<------------------->\n";
    echo "length = $length \n\n";
} while ($iterator > 0);

echo "\n+++++++++++++++++++++++++++++++++\n";

$iterator_key = null;
while ($iterator_key_data = $redis->scan($iterator_key)) {
    foreach ($iterator_key_data as $key)
        echo "key = $key \n";
    echo "<---------------->\n\n";
}

echo "\n+++++++++++++++++++++++++++++++++\n";

$iterator_temp = null;
$result_data = $redis->scan($iterator_temp,"*",15);
foreach ($result_data as $value)
    echo "==> $value \n";





