<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午2:24
 */

/* swoole_table 基本使用 */

//2 => 指定行数
$table = new swoole_table(2);

$table->column('id',\Swoole\Table::TYPE_INT);
$table->column('data',\Swoole\Table::TYPE_STRING,128);

//创建表
$table->create();
//查看内存表结构
//var_dump($table);

$table->set(1,["id" => 100,"data" => "hello world"]);
$table->set(2,["id" => 120,"data" => "what are you doing?"]);
var_dump($table->get(1));
var_dump($table->get(2));

//统计行数
echo $table->count() . "\n";

//删除所有的行
foreach ($table as $key => $value) {
//    var_dump($table->get($key));
    $table->del($key);
}

//统计行数
echo count($table) . "\n";

echo "time = " . time();
