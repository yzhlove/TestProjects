<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 上午10:57
 */

/* sscan用法 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

/* 添加元素 */
$redis->sAdd("set_temp","old:user_1","old:user_2","new:user_1","old:user_3","new:user_2");

//显示所有元素
$result = $redis->sMembers("set_temp");
foreach ($result as $value)
    echo "value = $value \n";
echo "<-------------------------->\n\n";

// redis是单进程模式，如果set数据太多,sMembers会造成阻塞
//使用scan渐进式遍历元素

$set_iterator = null;
while ($iter_data = $redis->sScan("set_temp",$set_iterator,"*",2)) {
    foreach ($iter_data as $value) {
        echo "=> $value \n";
    }
    echo "\n";
}
echo "<-------------------------->\n\n";

//删除所有以old开始的key
$iterator = null;
while ($iter = $redis->sScan("set_temp",$iterator,"old*",5)) {
    foreach ($iter as $key)
        $redis->sRem("set_temp",$key);
}

$result = $redis->sMembers("set_temp");
foreach ($result as $value)
    echo "value = $value \n";
echo "<-------------------------->\n\n";


/* 清库操作  危险 慎用*/
/*
 * flushDB    根据当前数据库的编号清除当前数据库，例如当前在0号数据库，则清除零号数据库的所有key
 * */
//$redis->flushDB();//清

/*
 * 清除所有编号数据库的所有key.，默认配置为16个数据库，则16个数据库的所有key都会被清除
 * */
//$redis->flushAll();











