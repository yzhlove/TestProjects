<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/2
 * Time: 下午3:50
 */

// 时间测试

$start_time = time();

sleep(1);

$end_time = time();

echo "start_time = " . $start_time . " end_time = " . $end_time . "\n";

echo "end_time - start_time = " . ($end_time - $start_time);

echo "----------------------\n";

$arr = [1 => 'one',2,3,4,2 => 'yyyy','a' => 'world','c'=>'yes'];

foreach ($arr as $key => $value) {
    echo "$key = $value" . "\n";
}

echo "----------------------\n";

$value = "hello";

$$value = 100;

echo "hello = $hello\n";

var_dump($$value);

echo "----------------------\n";
