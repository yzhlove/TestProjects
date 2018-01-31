<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/30
 * Time: 下午1:35
 */
/* hScan导出数据应用 */
$redis = new Redis();
$redis->connect("127.0.0.1",6379);

$arr = [];
for ($i = 0;$i < 100;$i++) {
    $arr["key" . ($i + 1)] = ($i + 1);
}
$redis->hMset("export",$arr);

$result = $redis->hGetAll("export");
var_dump($result);

echo "<-------------------------->\n";

$iterator = null;
while ($iterator_data = $redis->hScan("export",$iterator,"*",10)) {
    foreach ($iterator_data as $key => $value) {
        echo $key . " - " . $value . "\n";
    }
    echo "<++++++++++++++++> \n";
}

$redis->expire("export",1);



