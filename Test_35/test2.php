<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/14
 * Time: 下午4:09
 */

$current_time = time();
echo date("Y-m-d H:i:s",$current_time);
echo " - " . $current_time . "\n";

$tm = strtotime("2018-05-14");
echo "tm = " . $tm . "\n";

//$current_time += 60 *60 * 24;
//echo date("Y-m-d H:i:s",$current_time);
//echo "\n";

echo strtotime(date("Y-m-d",$current_time));

