<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/1
 * Time: 下午4:29
 */
/* mongodb测试 */

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
if ($manager) {
    echo "connection successful!";
}else {
    echo "connection failure!";
}

// 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
$manager->executeBulkWrite('test.sites', $bulk);

$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);

foreach ($cursor as $document) {
    print_r($document);
}


// 查询数据
$query = new MongoDB\Driver\Query();
$cursor = $manager->executeQuery('quiz.quizzes',$query);

echo "<------------------------------------------>\n";

$i = 0;
foreach ($cursor as $document) {
    if ($i == 5)
        break;
    var_dump($document);
    $i++;
}
