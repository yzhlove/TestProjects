<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/20
 * Time: 下午1:46
 */

// 估值函數

require_once '00.php';


class Evaluation
{

    const _SPACE = 0;   // 空
    const _BLACK = 1;   // 黑
    const _WHITE = 2;   // 白

    const _DIRECTION_HORIZONTAL = 1;    // 水平
    const _DIRECTION_VERTICAL = 2;    // 垂直
    const _DIRECTION_LEFT_OBLIQUE = 3;    // 左斜
    const _DIRECTION_RIGHT_OBLIQUE = 4;    // 右斜

    const _EVALUATION_BLACK = '*';  // 黑
    const _EVALUATION_WHITE = '#';  // 白
    const _EVALUATION_SPACE = '-';  // 空

    public static $_DIRECTION = [self::_DIRECTION_HORIZONTAL, self::_DIRECTION_VERTICAL,
        self::_DIRECTION_LEFT_OBLIQUE, self::_DIRECTION_RIGHT_OBLIQUE];

    public static $_BOARD = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    // 評估模型
    public static $_EVALUATION_MODE = [
        '*****' => 50000,       // 連五

        '-****-' => 30000,      // 活四
        '-****#' => 15000,       // 死四
        '*-***' => 10000,        // 死四
        '**-**' => 10000,        // 死四

        '-***-' => 9000,        // 活三
        '-*-**-' => 8000,       // 活三
        '-***#' => 3000,        // 死三
        '-**-*#' => 3000,       // 死三
        '*-*-*' => 3000,        // 死三
        '-*-**#' => 3000,       // 死三
        '*--**' => 3000,        // 死三
        '#-***-#' => 3000,      // 死三

        '--**--' => 4000,       // 活二
        '-*-*-' => 4000,        // 活二
        '---**#' => 1000,       // 死二
        '-*--*#' => 1000,       // 死二
        '--*-*#' => 1000,       // 死二
        '*---*' => 1000,        // 死二
    ];

    // 下子
    public function setPoint(int $x,int $y,int $who) {
        if (static::$_BOARD[$x][$y] == static::_SPACE) {
            static::$_BOARD[$x][$y] = $who;
            return true;
        }
        return false;
    }

    // 拿到棋盤
    public static function getBoard() {
        return self::$_BOARD;
    }

    // 評估函數
    public function evaluateAt(int $yourself_point)
    {
        $start_time = time();
        $other_point = ($yourself_point == static::_BLACK) ? static::_WHITE : static::_BLACK;
        $yourself_optional = [];
        $other_optional = [];

        // 生成樣本
        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j < 15; $j++) {
                if (static::$_BOARD[$i][$j] == static::_SPACE) {
                    $point = new Point($i, $j);
                    $yourself_score = $this->getDirectionValue($point, $yourself_point);
                    $other_score = $this->getDirectionValue($point,$other_point);
                    if ($yourself_score) {
                        $point->setScore($yourself_score);
                        $yourself_optional[$yourself_score] = $point;
                    }
                    if ($other_score) {
                        $point->setScore($other_score);
                        $other_optional[$other_score] = $point;
                    }
                }
            }
        }

        echo "time = " . (time() - $start_time)  . "\n";

        krsort($yourself_optional);
        krsort($other_optional);

        $yourself_point_obj = current($yourself_optional);
        $other_point_obj = current($other_optional);

        echo "your:{$yourself_point_obj} other:{$other_point_obj} \n";

        if ($yourself_point_obj->score_ < $other_point_obj->score_)
            return $other_point_obj;
        return $yourself_point_obj;
    }

    // 拿到模型的值
    public function getDirectionValue(Point $point, int $who)
    {
        $temp_value = 0;
        foreach (static::$_DIRECTION as $direction) {
            $str = $this->getStringMode($point, $direction, $who);
            if ($str) {
                $temp_value += $this->modelMatch($str);
            }
        }
        return $temp_value;
    }

    //  模型匹配
    public function modelMatch(string $model_str)
    {
        $value = 0;
        foreach (static::$_EVALUATION_MODE as $mode_item => $number) {
            if (strstr($model_str, $mode_item)) {
                $value += $number;
//                echo "MODE: parent_str:{$model_str} child_str:{$mode_item} number:{$number} \n\n";
            }
        }
        return $value;
    }


    public function getStringMode(Point $point, int $direct, int $yourself_point)
    {
        $str = '*';
        // 生成水平模型 "——"
        if ($direct == static::_DIRECTION_HORIZONTAL) {
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_, $point->y_ - $i, $yourself_point);
            $str = strrev($str);
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_, $point->y_ + $i, $yourself_point);
            return $str;
        }
        // 生成垂直模型 "|"
        if ($direct == static::_DIRECTION_VERTICAL) {
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ - $i, $point->y_, $yourself_point);
            $str = strrev($str);
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ + $i, $point->y_, $yourself_point);
            return $str;
        }
        // 生成左斜模型 "/"
        if ($direct == static::_DIRECTION_LEFT_OBLIQUE) {
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ + $i, $point->y_ - $i, $yourself_point);
            $str = strrev($str);
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ - $i, $point->y_ + $i, $yourself_point);
            return $str;
        }
        // 生成右傾模型 "\"
        if ($direct == static::_DIRECTION_RIGHT_OBLIQUE) {
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ - $i, $point->y_ - $i, $yourself_point);
            $str = strrev($str);
            for ($i = 1; $i <= 5; $i++)
                $str .= $this->getStringFlag($point->x_ + $i, $point->y_ + $i, $yourself_point);
            return $str;
        }
        return false;
    }

    public function getStringFlag(int $x, int $y, int $yourself_point)
    {
        if ($x < 0 || $x > 14 || $y < 0 || $y > 14) return '';
        $other_point = ($yourself_point == static::_BLACK) ? static::_WHITE : static::_BLACK;
        if (static::$_BOARD[$x][$y] == $yourself_point) return static::_EVALUATION_BLACK;
        if (static::$_BOARD[$x][$y] == $other_point) return static::_EVALUATION_WHITE;
        if (static::$_BOARD[$x][$y] == static::_SPACE) return static::_EVALUATION_SPACE;
        return '';
    }

}