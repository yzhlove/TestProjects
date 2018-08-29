<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/22
 * Time: 下午4:54
 */

$users = [
   233 => ['name' => 'yzh','age' => 16,'number' => 25,'birthday' => '1996-12-24'],
   433 => ['name' => 'xjj','age' => 17,'number' => 27,'birthday' => '1996-12-24'],
   633 => ['name' => 'xyj','age' => 18,'number' => 24,'birthday' => '1996-12-24'],
];

$args = [];
foreach ($users as $user) {
    $args[] = $user['age'];
}

//array_multisort($args,SORT_DESC,$users);
//
//print_r($users);


uasort($users ,function ($a,$b) {
    return $a['age'] < $b['age'];
});
print_r($users);

