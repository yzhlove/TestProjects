<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/5
 * Time: 下午2:04
 */

function playDice($num = 5)
{
    $point_num = ['one' => 0, 'two' => 0, 'three' => 0, 'four' => 0, 'five' => 0, 'six' => 0];
    $point_map = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six'];
    for ($i = 0; $i < $num; $i++) {
        $temp = $point_map[mt_rand(1, 6)];
        $point_num[$temp]++;
    }
    return $point_num;
}

var_dump(playDice());