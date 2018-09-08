<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/8
 * Time: 下午2:35
 */

namespace src;

class RedisLock {

    private $config_;
    private $redis_;

    public function __construct(array& $config = [])
    {
        $this->config_ = $config;
        $this->redis_  = $this->connect();
    }

    /**
     * 获取redis
     * @return \Redis
     * @throws \Exception
     */
    private function connect() : \Redis {
        try{
            $redis = new \Redis();
            $redis->connect($this->config_['host'],$this->config_['port']);
            if (empty($this->config_['auth']))
                $redis->auth($this->config_['auth']);
            $redis->select($this->config_['index']);
        }catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
        return $redis;
    }

    /**
     * 加锁
     * @param string $key
     * @param int $expire_time
     * @return bool
     */
    public function lock(string $key, int $expire_time = 5) : bool {
        $lock = $this->redis_->setnx($key,time() + $expire_time);
        if (!$lock) {
            // 判断锁是否过期
            $lock_time = $this->redis_->get($key);
            if (time() > $lock_time) {
                // 所以过期，删除锁，重新获取
                $this->unlock($key);
                $lock = $this->redis_->setnx($key,time() + $expire_time);
            }
        }
        if ($lock)
            $this->redis_->expire($key,$expire_time);
        return $lock ? true : false;
    }


    /**
     * 释放锁
     * @param $key
     * @return bool
     */
    public function unlock($key) : bool {
        return $this->redis_->del($key);
    }

}