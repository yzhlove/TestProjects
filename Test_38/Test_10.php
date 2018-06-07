<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/6
 * Time: 下午8:48
 */


static $temp = 0;
static $tp = 0;
swoole_timer_tick(3 * 1000,function ($id,$param) use ($temp){
    static $index = 0;
    if ($index > 5) {
        swoole_timer_clear($id);
        return ;
    }
    $temp ++;
    $index ++;
    $param ++ ;
    echo "temp = " . $temp . " ";
    echo "param = " . $param . " ";
//    var_dump($param);
    echo "id = " . $id . " index = " . $index;
    echo " hello world \n";
},$tp);

//echo "id = " . $id . "\n";

swoole_timer_tick(2 * 1000,function () {
    echo "***";
});