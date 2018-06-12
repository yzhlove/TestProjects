<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/12
 * Time: 下午4:51
 */


function point_checho($point , $num) {

    static $point_ = 3;
    static $num_ = 4;

    # 检查骰子点数
    if ($point < 0 || $point > 6) return false;
//    if ($num < 0) return false;
    if ($point < $point_) return false;
    if ($point == $point_) {
        if ($num_ > $num) return true;
        else return false;
    }
    return true;
}
