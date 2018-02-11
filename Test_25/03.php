<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/11
 * Time: 下午4:16
 */
/* redis 锁实战 */

class RedisLock {

    private $_reids;
    public static $_default_key = "test_lock";

    public function __construct()
    {
        $this->_reids = new Redis();
        $this->_reids->connect("127.0.0.1",6379);
    }

    public function lock($key = '',$expir = 5) {

        $is_lock = $this->_reids->setnx($key,time() + $expir);
        // 不能获取锁
        if (!$is_lock) {
            // 判断锁是否过期
            $lock_time = $this->_reids->get($key);
            // 锁已过期,删除锁，重新获取
            if (time() > $lock_time) {
                $this->unlock($key);
                $is_lock = $this->_reids->setnx($key,time() + $expir);
            }
        }
        return $is_lock ? true : false;
    }

    public function unlock($key = '') {
        return $this->_reids->del($key);
    }


}

$redis_lock = new RedisLock();

// 获取锁
$is_lock = $redis_lock->lock(RedisLock::$_default_key,10);
if ($is_lock) {



}




