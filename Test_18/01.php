<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/29
 * Time: 下午3:01
 */

/* 测试 */
$question_info = ["question","select","successful"];
function questionInsert($question_info, $arr = []) {
    $question = [];
    if (is_array($arr) && count($arr) == 3) {
        $question[$question_info[0]] = $arr[0];
        $question[$question_info[1]] = $arr[1];
        $question[$question_info[2]] = $arr[2];
    }
    var_dump($question);
}


questionInsert($question_info,["hello world","A,B,C,D","C"]);


