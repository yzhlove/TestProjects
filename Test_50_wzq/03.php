<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/21
 * Time: 下午4:41
 */

require_once '01.php';
require_once '00.php';

function show(array $board) {
    for ($i = 0;$i < 15;$i++) {
        for ($j = 0;$j < 15;$j++) {
            if ($board[$i][$j] == 1)
                echo '$';
            elseif  ($board[$i][$j] == 2)
                echo '#';
            else
                echo '-';
            echo ' ';
        }
        echo "\n";
    }
    echo "\ninput:";
}

show(Evaluation::getBoard());

while ($read_line = fgets(STDIN)) {
    $read_line = str_replace(array("\n","\r","\r\n"),'',$read_line);
    if ($read_line == 'break') exit(0);

    $point = explode(':',$read_line);
    $evaluation = new Evaluation();
    $x = $point[1];
    $y = $point[0];
    $evaluation->setPoint($x,$y,Evaluation::_WHITE);

    $robot_point = $evaluation->evaluateAt(Evaluation::_BLACK);
    $evaluation->setPoint($robot_point->x_,$robot_point->y_,Evaluation::_BLACK);
    show(Evaluation::getBoard());

}


