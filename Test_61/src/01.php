<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/9/18
 * Time: 上午10:24
 */


var_dump(date("Ymd"));


$str_date = ["2018-09-15","2018-09-16","2018-09-17","2018-09-18","2018-09-19","2018-09-20","2018-09-21","2018-09-22","2018-09-23","2018-09-24"] ;

foreach ($str_date as $str) {
    echo date("W",strtotime($str)) . "\n";
}
