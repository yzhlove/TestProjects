<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/11
 * Time: 下午3:15
 */
/* redis简单队列 */

class RedisQueue {

    private $_redis_instance;
    private $_redis_side_port;
    private $_redis_side_ip;

    public static $_redis_key = "redis:queue";

    public function __construct()
    {
        $this->redis_init();
        $this->_redis_instance = new Redis();
        $this->_redis_instance->connect($this->_redis_side_ip,$this->_redis_side_port);
    }

    private function redis_init() {
        $this->_redis_side_ip = "127.0.0.1";
        $this->_redis_side_port = 6379;
    }

    public function push($value) {
        $status = $this->_redis_instance->rPush(self::$_redis_key,$value);
        if ($status)
            return true;
        return false;
    }

    public function pop() {
        $status = $this->_redis_instance->lPop(self::$_redis_key);
        if ($status)
            return $status;
        return false;
    }

    public function length() {
        $length = $this->_redis_instance->lLen(self::$_redis_key);
        return $length;
    }

    public function time_out($second) {
        $this->_redis_instance->expire(self::$_redis_key,$second);
    }

}


$redis_queue = new RedisQueue();

$a = new stdClass();
$a->name = "xjj";
$a->birthday = "1999-12-24";

$b = new stdClass();
$b->name = "xjj";
$b->birthday = "1999-12-24";

$c = new stdClass();
$c->name = "xjj";
$c->birthday = "1999-12-24";

$infoA = json_encode($a,JSON_UNESCAPED_UNICODE);
$infoB = json_encode($b,JSON_UNESCAPED_UNICODE);
$infoC = json_encode($c,JSON_UNESCAPED_UNICODE);

$redis_queue->push($infoA);
$redis_queue->push($infoB);
$redis_queue->push($infoC);

$len = $redis_queue->length();
for ($i = 0;$i < $len;$i++) {
    $value = $redis_queue->pop();
    echo "value = $value \n";
}

$redis_queue->time_out(1);















