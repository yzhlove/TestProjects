<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午11:10
 */

/* redis map 操作 */

/*
 * redis本身就是一种基于key-value形式的NoSQL数据库，
 * redis中的所有元素都是 以key-value的形式组织的，
 *
 * key-hash
 *      |
 *     hashKey - value
 * */

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

//redis中操作map（Hash）

 // 设置值
$status = $redis->hSet("hashmap","user_name","yurisa");

// 获取值
$name_str = $redis->hGet("hashmap","user_name");
echo "name_str = $name_str \n";

//如果键不存在返回nil(redis) false(php)
$name_age = $redis->hGet("hashmap","user_age");
var_dump($name_age);

echo "<---------------------------->\n";

// 删除hashKey
$status = $redis->hSet("hashmap","user_age",22);
$name_age = $redis->hGet("hashmap","user_age");
echo "hashmap_user_age = $name_age \n";
//返回删除hashKey的个数
$status = $redis->hDel("hashmap","user_age");
$name_age = $redis->hGet("hashmap","user_age");
echo "hashmap_user_age = $name_age \n";

echo "<---------------------------->\n";

//计算hashKey的个数
$length = $redis->hLen("hashmap");
echo "length = $length \n";

//批量设置hashKey-value
$status = $redis->hMset("hashTable",[
    "user_name" => "yurisa",
    "user_age" => 22,
    "user_birthday" => "1996-12-24"
]);

//批量获取hashKey-value
$result_arr = $redis->hMGet("hashTable",[
    "user_name","user_age","user_birthday"
]);

var_dump($result_arr);
echo "<---------------------------->\n";

//判断Hashkey是否存在
$status = $redis->hExists("hashTable","user_name");
if ($status) {
    echo "user_name is exists already !\n";
}

// 判断（键）是否存在
$status = $redis->exists("hashTable");
if ($status) {
    echo "hashTable is exists already!\n";
}

// 获取所有的 value
$result_value = $redis->hVals("hashTable");
var_dump($result_value);
$result_value = $redis->hVals("hashmap");
var_dump($result_value);
echo "<---------------------------->\n";

// 获取所有的hashKey - value
$result = $redis->hGetAll("hashTable");
var_dump($result);

// 计算value的字符串长度(hstrlen 需要redis_version >= 3.2)

//获取所有的key
$keys = $redis->hkeys("hashTable");
var_dump($keys);

//查看map的内部编码
$encoding = $redis->object("encoding","hashTable");
echo "encoding = $encoding \n";















