<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/19
 * Time: 上午9:59
 */

// 五子棋輸贏判定算法重置版

class Gomoku {

    const _PIECE_WHIT = 1;
    const _PIECE_BLACK = 2;

    private static $_BORDER = [
      // 1 2 3 4 5 6 7 8 9 A B C D E F
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 1
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 2
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 3
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 4
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 5
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 6
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 7
        [1,1,1,0,0,0,1,1,1,1,0,0,0,0,0],        // 8
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 9
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 10
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 11
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 12
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 13
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 14
        [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],        // 15
    ];


    public function isDirection(int $x,int $y,string $piece) {

    }

    // 橫向
    public function isLeft(int $x,int $y,int $piece) {
        $count = 0;
        $temp = $y;
        for ($i = 0;$i < 5 ;++$i) {
            if (self::$_BORDER[$x][--$temp] == $piece) {
                echo "x:{$x} y:{$temp} value:" . self::$_BORDER[$x][$temp] . "\n";
                $count++;
            }
            else break;
        }
        $temp = $y;
        for ($i = 0;$i < 5 ;++$i) {
            if (self::$_BORDER[$x][++$temp] == $piece) {
                echo "x:{$x} y:{$temp} value:" . self::$_BORDER[$x][$temp] . "\n";
                $count++;
            }
            else break;
        }
        return $count + 1;
    }

    // 縱向
    public function isRight(int $x,int $y,int $piece) {
        $count = 0;
        $temp = $x;

    }

    // 左斜搜索


    // 右斜搜索


}

$handler = new Gomoku();
$result = $handler->isLeft(7,12,Gomoku::_PIECE_WHIT);
echo 'result = ' . $result;
