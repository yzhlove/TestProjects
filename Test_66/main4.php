<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/10/10
 * Time: 下午2:20
 * @param int $div
 * @param int $share
 * @return array
 */


function getSplitArray(int $div,int $share) : array {
    $number_arr = array();
    $sum = $share;
    for ($i = 0;$i < ($div - 1);$i++) {
        $avg_number = (int)($sum / ($div - $i));
        $min_number = ceil($avg_number / 2);
        $rand_number = mt_rand($min_number,$avg_number + 1);
        $number_arr[] = $rand_number;
        $sum -= $rand_number;
    }
    $number_arr[] = $sum;
    return $number_arr;
}

for ($i = 0;$i < 5;$i++) {
    print_r(getSplitArray(10,100));
}

