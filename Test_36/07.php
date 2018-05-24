<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/18
 * Time: 下午10:57
 */

$queue = new SplQueue();

for ($i = 1;$i <= 5;$i++)
    $queue->push($i);

