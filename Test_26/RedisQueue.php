<?php
/**
 * Created by PhpStorm.
 * User: yurisa
 * Date: 18-2-15
 * Time: 下午10:58
 */
/* redis优先队列，基于redis有序集合实现 */

class RedisPriorityQueue {

    public static $_REDIS_KEY = "redis_priority_queue";
    private $_redis_instance;

    public function __construct()
    {
        $this->_redis_instance = new Redis();
        $this->_redis_instance->connect("127.0.0.1",6379);
    }

    public function push($weight,$value) {
        $status = $this->_redis_instance->zAdd(self::$_REDIS_KEY,$weight,$value);
        return $status;
    }

    public function pop() {

        // 根据score排序
        $result = $this->_redis_instance->zRevRangeByScore(self::$_REDIS_KEY,'+inf','-inf',['withscores' => true]);
//        print_r($result);
        // 拿到当前的key
        $current_key = key($result);
        // 拿到当前的value
        $current_value = current($result);
        // 删除队列中优先级最高的元素
        $this->_redis_instance->zRem(self::$_REDIS_KEY,$current_key);
        // 返回元素的key以及value
        return [$current_key => $current_value];
    }

    public function length() {
        return $this->_redis_instance->zCard(self::$_REDIS_KEY);
    }

}

//优先队列使用
$pq = new RedisPriorityQueue();
//$pq->push(1,"a");
//$pq->push(2,"b");
//$pq->push(3,"c");
//$pq->push(4,"d");
//
//print_r($pq->pop());

for ($i = 0;$i < 5;$i++) {
    // 随机产生优先级
    $index = mt_rand(0,100);
    // A -> 65 a -> 97
    $char_number = mt_rand(65, 65 + 26 - 1);
    // 入队
    $pq->push($index,chr($char_number));
}

for ($i = 0;$i < 5;$i++) {
    $result = $pq->pop();
    print_r($result);
}








