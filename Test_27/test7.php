<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/3/5
 * Time: 下午2:47
 */

for ($i = 1;$i < 15;$i++) {

    echo "i = " . $i . ' _ result = ' . $i / 2 . "\n";
    echo "i = " . $i . ' _ result = ' . intval($i / 2) . "\n";
    echo "i = " . $i . ' _ result = ' . ceil($i / 2) . "\n";
    echo "\n";
}