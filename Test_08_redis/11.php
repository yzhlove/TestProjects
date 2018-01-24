<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 下午2:32
 */
/* redis 有序集合的常用操作 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// 添加成员,返回添加成功的元素的个数
$status = $redis->zAdd("user:ranking",251,"tom");
echo "status = $status \n";
$status = $redis->zAdd("user:ranking",1,"tony",2,"aux",120,"sony");
echo "status = $status \n";

echo "<------------------------------->\n";

/*
 * redis3.2增加
 * nx   member必须不存在，才可以设置成功.用于添加
 * xx   member必须存在，才可以设置成功，用户更新
 * ch   返回此次操作，有序集合元素和分数发生变化的个数。
 * incr 对score做增加
 * */

// 计算成员的个数
$length = $redis->zCard("user:ranking");
echo "length = $length \n";

// 计算某个成员的分数
$score = $redis->zScore("user:ranking","sony");
echo "score = $score \n";

// 计算成员的排名
// zrank 分数从低到高排
$level = $redis->zRank("user:ranking","tom");
echo "tom_level = $level \n";

// zrevrank 分数从高到低排
$level = $redis->zRevRank("user:ranking","tom");
echo "tom_level = $level \n";

echo "<------------------------------->\n";

// 删除成员,返回删除成员的个数
$status = $redis->zRem("user:ranking","aux");
echo "status = $status \n";

$status = $redis->zRem("user:ranking","abc");
echo "status = $status \n";
echo "<------------------------------->\n";

// 增加成员的分数
$score = $redis->zIncrBy("user:ranking",50,"sony");
echo "sony_score = $score \n";
echo "<------------------------------->\n";
// 返回指定排名范围的成员
// zRange    从低到高返回
// zRevRange 从高到低返回
$redis->zAdd("user:ok",1,"a",2,"b",3,"k",4,"c",5,"d",6,"o",7,"e",8,"f",9,"g",10,"h");
$result = $redis->zRange("user:ok",0,10);
var_dump($result);
echo "<------------------------------->\n";
$result = $redis->zRange("user:ok",0,10,true);
var_dump($result);
echo "<------------------------------->\n";
$result = $redis->zRange("user:ok",0,5,true);
var_dump($result);
echo "<------------------------------->\n";

$result = $redis->zRevRange("user:ok","0","5",true);
var_dump($result);
echo "<------------------------------->\n";

// 返回指定分数范围的成员
// zrangebyscore    从低到高返回
// zrevrangebyscore 从高到低返回
$result = $redis->zRangeByScore("user:ok",4,7,["withscores" => true]);
var_dump($result);
echo "<------------------------------->\n";
// "-inf"   => 负无穷
// "+inf"   => 正无穷
$result = $redis->zRangeByScore("user:ok",'-inf','+inf',["withscores"=>true]);
var_dump($result);
echo "<------------------------------->\n";

//从高到低排
$result = $redis->zRevRangeByScore("user:ok",8,6,["withscores"=>true]);
var_dump($result);
echo "<------------------------------->\n";

// 返回指定分数范围成员的个数
$count = $redis->zCount("user:ok",0,7);
echo "count = $count \n";
echo "<------------------------------->\n";

// 删除指定排名内的升序元素, 返回删除元素的数量
$status = $redis->zRemRangeByRank("user:ok",0,2);
echo "status = $status \n";
echo "<------------------------------->\n";

// 删除指定分数范围的成员, 返回删除成员的个数
$status=  $redis->zRemRangeByScore("user:ok",7,"+inf");
echo "status = $status \n";
echo "<------------------------------->\n";

// 集合间的操作
$status = $redis->zAdd("user:rank:1",1,"kris",91,"mike",200,"frank",220,"tim",250,"martin",251,"tom");
echo "status = $status \n";
$status = $redis->zAdd("user:rank:2",8,"james",77,"mike",625,"martin",888,"tome");
echo "status = $status \n";
echo "<------------------------------->\n";

// 交集
$result = $redis->zInter("user_rank_inter",["user:rank:1","user:rank:2"]);
echo "result = $result \n";
$result = $redis->zRange("user_rank_inter",0,-1,true);
var_dump($result);

// 使用weight 以及 aggregate
/*
 * 默认使用的参数 SUM ，可以将所有集合中某个成员的 score 值之 和 作为结果集中该成员的 score 值；使用参数 MIN ，可以将所有集合中某个成员的
 * 最小 score 值作为结果集中该成员的 score 值；而参数 MAX 则是将所有集合中某个成员的 最大 score 值作为结果集中该成员的 score 值
 * */
echo "<------------------------------->\n";

$result = $redis->zInter("user_rank_inter",["user:rank:1","user:rank:2"],[1,0.5],"MAX");
echo "result = $result \n";
$result = $redis->zRange("user_rank_inter",0,-1,true);
var_dump($result);
echo "<------------------------------->\n";

// 并集（ 同交集一致）
$result = $redis->zUnion("user_rank_union",["user:rank:1","user:rank:2"]);
echo "result=  $result \n";
$result =  $redis->zRange("user_rank_union",0,-1,true);
var_dump($result);
echo "<------------------------------->\n";

// 并集，权重，聚合效果
$result = $redis->zUnion("user_rank_union",["user:rank:1","user:rank:2"],[1,2],"SUM");
echo "result = $result \n";
$result = $redis->zRange("user_rank_union",0,-1,true);
var_dump($result);


//设置key过期
$redis->expire("user:ranking",1);
$redis->expire("user:ok",1);
