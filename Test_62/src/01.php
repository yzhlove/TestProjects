<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/29
 * Time: 下午5:40
 */
/* swoole 互斥锁 */

$string = 'hello_world';

for ($i = 0;$i < 2;$i++) {
    $mutex = new \Swoole\Lock(SWOOLE_MUTEX,$string);
    //    $mutex->lock();
    if (false === $mutex->trylock()) {
        echo "抢锁失败!";
        return ;
    }
    echo "i =  {$i} \n";
    sleep(3);
    $mutex->unlock();

}








