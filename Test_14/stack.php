<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 上午10:52
 */

/* 利用
lpush + lpop = stack
 */

class RedisStack {

    private $redis;
    private $key;

    public function __construct($timeout = 0)
    {
        $this->redis = new Redis();
        $this->redis->connect("127.0.0.1",6379);
        $this->key = uniqid() . time();
        echo "key = $this->key \n";
        if ($timeout) {
            $this->redis->expire($this->key,$timeout);
        }
    }

    public function push($value) {
        return $this->redis->lPush($this->key,$value);
    }

    public function length() {
        return $this->redis->lLen($this->key);
    }

    public function pop() {
//        return $this->redis->rPop($this->key);    //Queue
        return $this->redis->lPop($this->key);      //Stack
    }

    public function top() {
        return $this->redis->lIndex($this->key,0);
    }

    public function empty() {
        if ($this->length() > 0)
            return false;
        return true;
    }

    public function print() {
        return $this->redis->lRange($this->key,0,-1);
    }
}

//使用栈
$stack = new RedisStack(60 * 3);
$stack->push("a");
$stack->push("b");
$stack->push("c");

echo "length = " . $stack->length() . "\n";
echo "top = " . $stack->top() . "\n";

var_dump($stack->print());

$stack->pop();

var_dump($stack->print());

