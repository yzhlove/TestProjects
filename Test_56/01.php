<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/22
 * Time: 下午4:06
 */

//array_multisort 用法


$temp_arr_1 = [1,3,5,7,9];
$temp_arr_2 = [2,3,4,5,7];
$temp_arr_3 = [1,2,1,3,4];

array_multisort($temp_arr_1,SORT_DESC,$temp_arr_2,SORT_ASC,$temp_arr_3);

print_r($temp_arr_1);
print_r($temp_arr_2);
print_r($temp_arr_3);
