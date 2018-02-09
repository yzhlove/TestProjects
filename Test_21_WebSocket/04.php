<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/5
 * Time: 下午9:30
 */
/* swoole定时器测试 */

$a = swoole_timer_after(5000,function () {
    echo "hello world";
});

echo "a = $a \n";

$b = swoole_timer_after(2000,function () use ($a){

    echo "i love you \n";
    swoole_timer_clear($a);

});

echo "b = $b \n";

sleep(5);

$c = swoole_timer_after(3000,function () {
   echo "what are you doing \n";
});

echo "c = $c \n";