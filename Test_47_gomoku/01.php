<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/16
 * Time: 下午8:06
 */



$arr = [
//  ⬇️ x
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 0, 2, 2, 1, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]       // ➡️ y
];


for ($i = 0;$i < 15;$i++) {
    for ($j = 0;$j < 15;$j++) {
        echo $arr[$i][$j] . ',';
    }
    echo "\n";
}

function is_win(int $x ,int $y ,$arr) {

    $point = 1;
    $count = 0;
    for ($y_ = 0;$y_ < 15;$y_++) {
        if ($arr[$x][$y_++] == $point)
            ++ $count;
        else
            $count = 0;
        if ($count >= 5)
            return true;
    }

    if ($y > $x) {
        $x_ = 0;
        $y_ = $y - $x;
        $count = 0;
        for ($i = $y_;$i < 15;$i++) {
            if ($arr[$x_++][$y_++] == $point)
                ++ $count;
            else
                $count = 0;
            if ($count >= 5)
                return true;
        }
    } elseif ($y < $x) {
        $y_ = 0;
        $x_ = $x - $y;
        $count = 0;
        for ($i = $x_;$i < 15;$i++) {
            if ($arr[$x_++][$y_++] == $point)
                ++ $count;
            else
                $count = 0;
            if ($count >= 5)
                return true;
        }
    } else {
        $x_ = $y_ = 0;
        for ($i = $x_;$i < 15;$i++) {
            if ($arr[$x_++][$y_++] == $point)
                ++ $count;
            else
                $count = 0;
            if ($count >= 5)
                return true;
        }
    }

    return false;




}

//function is_win(int $x, int $y, array $arr)
//{
//    // 橫向
//    $temp = 1;
//    $count = 0;
//    for ($i = 0; $i < 15; $i++) {
//        if ($arr[$x - 1][$i] == $temp)
//            ++$count;
//        else {
//            $count = 0;
//        }
//        if ($count >= 5)
//            return true;
//    }
//    // 縱向
//    $count = 0;
//    for ($i = 0; $i < 15; $i++) {
//        if ($arr[$i][$y - 1] == $temp)
//            ++$count;
//        else
//            $count = 0;
//        if ($count >= 5)
//            return true;
//    }
//    // 左斜
//    $count = 0;
//    $start_point = $x - $y;
//    $y_ = 0;
//    for ($i = $start_point; $i < 15; $i++) {
//        try {
//            echo "x = {$start_point} y = {$y_} \n";
//            if ($arr[$i][$y_++] == $temp)
//                ++$count;
//            else
//                $count = 0;
//            if ($count > 5)
//                return true;
//        } catch (Exception $e) {
//            $count = 0;
//        }
//    }
//
//    echo "------------\n";
//    // 右斜
//    $count = 0;
//    $start_point = $x + $y - 15 -1;
//    $y_ = 15;
//    for ($i = $start_point; $i < 15; $i++) {
//        try {
//            echo "x = {$start_point} y = {$y_}  arr = " . $arr[$start_point][$y_] . "\n";
//            if ($arr[$start_point++][--$y_] == $temp)
//                ++$count;
//            else
//                $count = 0;
//            if ($count >= 5)
//                return true;
//        } catch (Exception $e) {
//            $count = 0;
//        }
//    }
//    return false;
//}

echo is_win(5, 5, $arr);

