<?php
/**
 * Created by PhpStorm.
 * User: yurisa
 * Date: 18-2-15
 * Time: 下午11:34
 */
// 拿到当前元素的key值
$arr = ["one" => "sony","two" => "google","three" => "tenlent"];

// 一个简单的数组便利
echo "reset = " . reset($arr) . "\n";
echo "current = " . current($arr) . "\n";
echo "key = " . key($arr) . "\n";
echo "next = " . next($arr) . "\n";
echo "current = " . current($arr) . "\n";
echo "key = " . key($arr) . "\n";
echo "prev = " . prev($arr) . "\n";
echo "current = " . current($arr) . "\n";
echo "key = " . key($arr) . "\n";
echo "end = " . end($arr) . "\n";
echo "current = " . current($arr) . "\n";
echo "key = " . key($arr) . "\n";
echo "reset = " . reset($arr) . "\n";

echo "\n ----------------------------- \n";
$end_value = end($arr);
for ($str = reset($arr);$str;$str = next($arr)) {
    echo "str = $str \n";
    echo "key = " . key($arr);
    echo "  current = " . current($arr) . "\n";
    sleep(1);
}






