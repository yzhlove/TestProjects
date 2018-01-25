<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/25
 * Time: 下午2:38
 */
/* redis 中的bitmap使用 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

// redis中的bitmap


//设置bitmap
for ($i = 0;$i < 50;$i++) {
    $number = mt_rand(0,100);
    $status = $redis->setBit("unique",$number,1);
}

for ($i = 0;$i < 50;$i++) {
    $number = mt_rand(0,100);
    $status = $redis->setBit("equal",$number,1);
}

//获取bitmap
$length = 0;
for ($i = 0;$i <= 100;$i++) {
    $status = $redis->getBit("unique",$i);
    if ($status) $length ++;
    echo "unique $i = $status \n";
}

echo "length = $length \n";

// 获取bitmap指定范围为1的个数
$count = $redis->bitCount("unique");
echo "count = $count \n";

echo "<---------------------->\n";

// bitmap间的操作
// AND -> 与 OR -> 或 NOT -> 非 XOR -> 异或
// "unique:equal:and" -> 把操作的结果放入到此key中
// [] -> 需要操作的key的数组
// 返回操作的结果数
// 求交集（AND）
$length = 0;
$result = $redis->bitOp("AND","unique:equal:and","unique","equal");
echo "result = $result \n";
for ($i = 0;$i <= 100;$i++) {
    $status = $redis->getBit("unique:equal:and",$i);
    if ($status) $length ++;
    echo "unique $i = $status \n";
}
$count = $redis->bitCount("unique:equal:and");
echo "length = $length \n";
echo "count = $count \n";

// 求并集（OR）
$result = $redis->bitOp("OR","unique:equal:or","unique","equal");
echo "result = $result \n";
echo "count = " . $redis->bitCount("unique:equal:or") . "\n";
echo "<------------------------->\n";

for ($i = 0;$i <= 100;$i++) {
    $status = $redis->getBit("unique:equal:or",$i);
    if ($status) $length ++;
    echo "unique $i = $status \n";
}

echo "<------------------------->\n";

// 计算bitmaps中的第一个值为targetBit的偏移量
// 计算unique:equal:and中第一个值为1的索引
$data = $redis->bitpos("unique:equal:and",1);
echo "data = $data \n";

// 在[16-24]这个区间内计算第一个值为0的元素的索引
// start（2） end（3） 的单位都是字节，即1byte = 8bit
// 所以 start的索引为2 * 8 = 16 ,end的索引为 3 * 8 = 24
/*
 * 如果不设置结束字节且键值的所有二进制位都是1，则当要查询值为0的二进制位偏移量时，返回结果会是键值长度的下一个字位的偏移量。这是因为Redis会认为键值长度之后的二进制位都是0
 * */
$data = $redis->bitpos("unique:equal:or",0,2,3);
echo "data = $data \n";



 //设置key过期
$redis->expire("unique",1);
$redis->expire("equal",1);
$redis->expire("unique:equal:and",1);
$redis->expire("unique:equal:or",1);







