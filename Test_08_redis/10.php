<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 上午11:14
 */

/* redis 中集合常用的操作 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 往集合中添加元素 ,返回成功添加元素的个数
$status = $redis->sAdd("love_set","what");
echo "status = $status \n";
$status = $redis->sAdd("love_set","are","you","doing");
echo "status = $status \n";

echo "<---------------------------->\n";

// 删除元素, 返回成功删除元素的个数
$status = $redis->sRem("love_set","how");
echo "status = $status \n";
$status = $redis->sRem("love_set","are");
echo "status = $status \n";
$status = $redis->sRem("love_set","what","doing");
echo "status = $status \n";

echo "<---------------------------->\n";

//计算元素的个数("you"已经存在)
$status = $redis->sAdd("love_set","i","love","yes","you");
echo "status = $status \n";
$length = $redis->sCard("love_set");
echo "length = $length \n";

echo "<---------------------------->\n";

// 判断元素是否在集合中
$status = $redis->sIsMember("love_set","love");
echo "status = $status \n";
$status = $redis->sIsMember("love_set","live");
echo "status = $status \n";


// 判断key是否存在
$status = $redis->exists("love_set");
echo "status = $status \n";

echo "<---------------------------->\n";

// 随机从集合中返回指定个数的元素
$result = $redis->sRandMember("love_set",3);
var_dump($result);

//随机从集合中弹出元素类似($redis->sRandMember("love_set",1))
$result = $redis->sPop("love_set");
var_dump($result);

echo "<---------------------------->\n";

// 获取集合中的所有元素 ,返回结果的顺序是随机的
$status = $redis->sAdd("love_set",1,2,3,4,5);
echo "status = $status \n";
$result = $redis->sMembers("love_set");
var_dump($result);
echo "<---------------------------->\n";

// 集合之间的操作
$status = $redis->sAdd("live_set",1,4,2,5,3,6,7,7,0,8,9);
echo "status = $status \n";

// 求多个集合的交集
$result = $redis->sInter("love_set","live_set");
var_dump($result);

// 求多个集合的并集
$result = $redis->sUnion("love_set","live_set");
var_dump($result);

// 求多个集合的差集 (差集返回第一个key中存在而第二个key中不存在的元素)
$result_1 = $redis->sDiff("love_set","live_set");
var_dump($result_1);
$result_2 = $redis->sDiff("live_set","love_set");
var_dump($result_2);

echo "<---------------------------->\n";

// 将集合操作的结果保存 ，返回集合中的元素数量
// 交集
$result = $redis->sInterStore("love_live_sinter","love_set","live_set");
echo "result = $result \n";
$result = $redis->sMembers("love_live_sinter");
var_dump($result);

echo "<---------------------------->\n";
// 并集
$result = $redis->sUnionStore("love_live_union","love_set","live_set");
echo "result = $result \n";
$result = $redis->sMembers("love_live_union");
var_dump($result);

echo "<---------------------------->\n";
//差集
$result_1 = $redis->sDiffStore("love_live_diff","love_set","live_set");
var_dump($result_1);
$data = $redis->sMembers("love_live_diff");
var_dump($data);
$result_2 = $redis->sDiffStore("live_love_diff","live_set","love_set");
var_dump($result_2);
$data = $redis->sMembers("live_love_diff");
var_dump($data);
echo "<---------------------------->\n";

// 设置key过期
$redis->expire("love_set",1);
$redis->expire("live_set",1);
$redis->expire("love_live_sinter",1);
$redis->expire("love_live_union",1);
$redis->expire("love_live_diff",1);
$redis->expire("live_love_diff",1);