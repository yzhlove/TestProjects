<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/4
 * Time: 下午5:51
 */

$string = "hello.world.fuck";

$index = strrpos($string,'.');
echo "index = " . $index;

echo substr($string,0,$index);
