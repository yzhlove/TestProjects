<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/7
 * Time: 上午11:45
 */
$data_arr = [
  ["1234" => 120],
  ["5678" => 170]
];

$temp_arr = [];
foreach ($data_arr as $vale) {
    foreach ($vale as $open_id => $socre)
        $temp_arr[$open_id] = $socre;
}

var_dump($temp_arr);

$temp_arr = array_flip($temp_arr);

var_dump($temp_arr);

if (count($temp_arr) == 1) {

    echo "< 1 >";
    $temp_arr = array_flip($temp_arr);
    echo key($temp_arr);

}

$temp_arr = array_flip($temp_arr);

arsort($temp_arr);
echo key($temp_arr);


