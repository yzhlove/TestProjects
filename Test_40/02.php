<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/27
 * Time: 下午2:24
 */


$loop_queue = [1 => '101' , 2 => '202',4 => '404',7 => '707'];
$query_sid_seat = 4;
$max = 8;
$length = $max + $query_sid_seat;
$temp_queue = [];
$keys = array_keys($loop_queue);
var_dump($keys);
for ($i = $query_sid_seat;$i < $length;$i++) {
    $seat = $i <= $max ? $i : $i - $max;
    echo "seat = " . $seat . "\n";
    if (in_array($seat,$keys)) {
        $temp_queue[] = $loop_queue[$seat];
    }
}

var_dump($temp_queue);
