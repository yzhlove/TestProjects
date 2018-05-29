<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/5/28
 * Time: 下午10:36
 */

# 数组测试

$point_map = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six'];

foreach ($point_map as $type) {
    $temp = $point_map[mt_rand(1, 6)];
    $$temp++;
    echo "temp = " . $temp . " -- " . $$temp . "\n";
//    $$point_map[mt_rand(1,6)] ++;
}

echo "========\n";

foreach ($point_map as $type) {
    if ($$type)
        echo $type . " = " . $$type . "\n";
}

echo "\n";

//for ($i = 0;$i < 15;$i++) {
//    echo mt_rand(1,6) . "\n";
//}



