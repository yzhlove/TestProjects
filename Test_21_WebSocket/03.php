<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/5
 * Time: 下午8:38
 */

$a_id = swoole_timer_after(2000,function () {
   echo "hello";
});

echo "id = -> $a_id \n";

$b_id = swoole_timer_after(1000,function () {
   echo "world";
});

echo "id = -> $b_id \n";

$c_id = swoole_timer_after(3000,function () {
   echo "abc";
});
echo "id = -> $c_id \n";