<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/9
 * Time: 上午10:18
 */


$str = '/Users/apple/projects/pet_php/temp/b8f4qzg9yk.jpeg';

$result = strrpos($str,'/');
echo "result = " . $result . ' split = ' . substr($str,$result + 1);

//$str = "" . 3;
//var_dump($str);

$path = "APP_NAME/temp/%s";
echo "\n";
$res = sprintf($path,substr($str,$result + 1));
echo "res = " . $res;
