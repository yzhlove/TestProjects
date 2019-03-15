<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2019-03-10
 * Time: 15:26
 */

$a = 1;
if (strpos("baidu.com","ba")) {
    $a = 2;
}
var_dump($a);
var_dump(strpos("中国","国"));
var_dump(mb_strpos("中国","国"));
$list = [1,2,3];
foreach ($list as $val) {
    $val = 2 * $val;
}
foreach ($list as $val) {
    $val = 3 * $val;
}
var_dump($list);
/*
/Users/love/yzhGit/TestProjects/Test_81/main.php:15:
int(1)
/Users/love/yzhGit/TestProjects/Test_81/main.php:17:
int(3)
/Users/love/yzhGit/TestProjects/Test_81/main.php:19:
int(1)
/Users/love/yzhGit/TestProjects/Test_81/main.php:28:
array(3) {
  [0] =>
  int(1)
  [1] =>
  int(2)
  [2] =>
  int(3)
}
*/