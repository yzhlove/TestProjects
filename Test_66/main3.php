<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/10
 * Time: 下午1:37
 * @param int $div
 * @param int $count
 */

//  平均数分配

function avg(int $div,int $count) {
    $arr = array();
    $sum = $count;
    for ($i = 0;$i < ($div - 1);$i++) {
        $avg = (int)($sum / ($div - $i));
        $rand_min = ((int)($avg / 2)) ?? 1;
        $rand_num = (int)mt_rand($rand_min,$avg);
        $arr[] = $rand_num;
        echo "sum = {$sum} avg = {$avg} rand_min = {$rand_min} rand_num = {$rand_num} \n";
        $sum -= $rand_num;
    }
    $arr[] = $sum;
    return $arr;
}

var_dump(avg(6,5));
