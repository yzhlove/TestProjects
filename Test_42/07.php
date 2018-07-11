<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/2
 * Time: 下午5:25
 */

$arr = [
    'name' => 'hello'
];

switch ($arr['status']) {

    case 'A':
        {
            echo 'AAA';
        }
        break;
    case 'B':
        {
            echo 'BBB';
        }
        break;
    default:
        {
            echo 'CCC';
        }
        break;
}

