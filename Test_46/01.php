<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/16
 * Time: 下午4:36
 */

$debug = debug_backtrace();
var_dump($debug);

$file_path = __DIR__ . '/temp/' . str_replace('/','_',$debug[count($debug) - 1]['file']);
echo 'file_path = ' . $file_path;
