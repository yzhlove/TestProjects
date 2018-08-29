<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/29
 * Time: 上午11:17
 */

// php系统编程


$out = shell_exec("ps -x | grep php");
var_dump($out);

echo "\n-------------------------------------\n";

$cmd_out = [];

exec("ps -x | grep php",$cmd_out,$shell_status);

//var_dump($shell_status);
//var_dump($cmd_out);

$server_config = ['swoole_services','beast_services'];

foreach ($cmd_out as $string) {
    foreach ($server_config as $item) {
        if (strchr($string,$item)) {
            echo $item . 'is find successful!' . "\n";
        }
    }
}



