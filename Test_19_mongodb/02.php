<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/1
 * Time: 下午4:45
 */

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
if ($manager) {
    echo "connection successful!";
}else {
    echo "connection failure!";
}

// 查询数据
$query = new MongoDB\Driver\Query([],[]);
$cursor = $manager->executeQuery('quiz.quizzes',$query);

$i = 0;
foreach ($cursor as $document) {
//    var_dump($document);
    echo "一级标题 -> " . $document->school . "\n";
    echo "二级标题 -> " . $document->type . "\n";
    echo "题目 -> "  . $document->quiz . "\n";
    foreach ($document->options as $key => $value) {
        echo "\t" . chr(ord('A') + $key) . " -> " . $value . "\n";
    }
    echo "答案 -> " . $document->options[$document->answer - 1] . "\n";

    echo "<-------------------------------->\n";
    if ($i == 100)
        break;
    $i++;
}
