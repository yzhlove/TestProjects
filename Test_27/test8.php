<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/6
 * Time: 下午10:03
 */

//$user = 0;
//echo "user = $user";
//$user->sid = 12;
//echo "user-sid = " . $user->sid;

//for ($i = 0;$i < 10;$i++) {
//    $number = mt_rand(0,30);
//    echo "number = " . $number . "\n";
//}

$current_time = time();
sleep(2);
$last_time = time();
echo "current_time = " . $current_time . " _ last_time = " . $last_time . "\n";
echo $last_time - $current_time;