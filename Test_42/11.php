<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/6
 * Time: 下午8:20
 */

$arr = [1 => '123',2 => '456',3 => '124',4 => '134',5 => 0,6 => 0,7=> '123',8 => '212'];

$index = 0;
foreach ($arr as $key => $value) {
    if ($value)
        ++ $index;
}

echo 'index = ' . $index;