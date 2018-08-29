<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/21
 * Time: 下午12:00
 */

$arr = [1,2,3,4,5,6,7,8,9,10];

for ($i = 0;$i < count($arr);$i++) {
    echo $arr[$i];
}

$flag = opcache_reset();
echo "opcache = " . $flag;