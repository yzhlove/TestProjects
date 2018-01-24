<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/24
 * Time: 下午5:39
 */
/* redis 单个键管理 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// key重命名
$status = $redis->set("what","what");
$value = $redis->get("what");
echo "value = $value \n";

// rename key
$status = $redis->rename("what","why");
$value = $redis->get("what");
echo "what_value = $value \n";
$value = $redis->get("why");
echo "why_value = $value \n";

//renameNx() 如果key已经存在，则rename失败
/*
 * rename会del之前的old key,如果value数据非常大，可能会阻塞redis，慎用。
 * */

//返回redis中的数据条数
$dbsize = $redis->dbSize();
echo "dbsize = $dbsize \n";

//返回redis中所有的key
$db_arr = $redis->keys("*");
var_dump($db_arr);

echo "<--------------------------->\n";

//随机返回一个key
$key = $redis->randomKey();
echo "key = $key \n";

//key过期
/*
 * 对于一个已经设置过期时间的key，使用set或者类似的函数会导致key的过期时间失效
 * */
$status = $redis->set("fuck","you");
// 如果键过期的时间设置为负值，则会被马上删掉。
$status = $redis->expire("fuck",10);

// ttl键过期的剩余时间
echo "<--------------------------->\n";
for ($i = 0;$i <= 10 ;$i++) {
    echo $redis->ttl("fuck") . "\n";
    sleep(1);
}
echo "<--------------------------->\n";

// key迁移
// move命令只做了解即可（move是内部做迁移）
//将why从数据库0迁移到数据库1（不建议在生产环境中使用）
$status = $redis->move("why",1);
//切换到数据库1
$redis->select(1);
$data = $redis->get("why");
echo "data = $data \n";

//切回到0数据库
$redis->select(0);

//dump + restore 在redis实例之间迁移数据，非原子性，已弃用

// migrate 实例迁移，原子性
// host -> 地址
// port -> 端口
// key  -> 需要迁移的key
// db   -> 几号数据库，默认[0-15]一共16个数据库
// timeout  -> 时长
// copy -> true,迁移后不删除源key
// replace -> true,不管目标是否存在key都将其覆盖数据

$status = $redis->migrate("127.0.0.1",6380,"why",0,1000,true,true);





