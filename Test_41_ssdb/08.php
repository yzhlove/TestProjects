<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/29
 * Time: 下午2:04
 */


$arr = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six'];
$new_arr = array_flip($arr);

var_dump($new_arr);