<?php
/**
 * Created by PhpStorm.
 * User: yurisa
 * Date: 18-2-15
 * Time: 下午8:09
 */
/* redis有序集合练习 */
define("REDIS_KEY","user:queue");

$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 添加
$status = $redis->zAdd(REDIS_KEY,1,"tom");
echo "status = $status \n";

$status = $redis->zAdd(REDIS_KEY,1,"tony",2,"sony",3,"linux");
echo "status = $status \n";

// 计算成员的个数
$length = $redis->zCard(REDIS_KEY);
echo "length = $length \n";

// 计算出成员的分数
$score = $redis->zScore(REDIS_KEY,"sony");
echo "score = $score \n";

// 按照分数从低到高排序
$level = $redis->zRank(REDIS_KEY,"sony");
echo "sony_rank = $level \n";

// 计算分数从高到低排
$level = $redis->zRevRank(REDIS_KEY,"sony");
echo "sony_rev_rank = $level \n";

echo "\n ---------------------------- \n";

$status = $redis->zAdd(REDIS_KEY,15,"one",16,"two",17,"three");
echo "status = $status \n";

//删除成员，返回成员的个数
$status = $redis->zRem(REDIS_KEY,"one","two");
echo "status_rem = $status \n";


// 增加成员的分数
$add_socre = $redis->zIncrBy(REDIS_KEY,100,"sony");
echo "add_score = $add_socre \n";

// 返回指定排名范围的成员
// zRang    -> 从低到高
// zRevRange-> 从高到低

echo "\n ---------------------------- \n";

$range_result = $redis->zRange(REDIS_KEY,0,-1,true);
print_r($range_result);

$rev_range_result = $redis->zRevRange(REDIS_KEY,0,-1,true);
print_r($rev_range_result);

echo "\n ---------------------------- \n";

// redis 不允许添加member相同的成员
$status = $redis->zAdd(REDIS_KEY,40,"sony");
echo "add_sony_status = $status \n";

// 返回指定分数的成员
$range_score_result = $redis->zRangeByScore(REDIS_KEY,'-inf','+inf',['withscores' => true]);
print_r($range_score_result);

echo "\n ---------------------------- \n";

$rev_range_score_result = $redis->zRevRangeByScore(REDIS_KEY,'+inf','-inf',['withscores' => true]);
print_r($rev_range_score_result);


echo "\n ---------------------------- \n";

// 返回指定分数范围的成员的个数
$member_index = $redis->zCount(REDIS_KEY,0,10);
echo "member_index = $member_index \n";

$member_index_count = $redis->zCount(REDIS_KEY,'-inf','+inf');
echo "member_index_count = $member_index_count \n";

echo "\n ---------------------------- \n";









$redis->expire(REDIS_KEY,1);
