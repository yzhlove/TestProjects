<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/1
 * Time: 下午5:38
 */

// list 增强
 $arr = [
     ['id' => 1,'name' => 'Tom'],
     ['id' => 2,'name' => 'Fred']
 ];


// while (['id' => $id,'name' => $name] = $arr) {
//     echo "id = {$id} name = {$name} \n";
// }

//foreach ($arr as [$id ,$name]) {
//    echo "id = {$id} name = {$name} \n";
//}

['id' =>  $id ,'name' => $name] = $arr[0];
echo "id = {$id} name = {$name} \n";

echo "--------\n";

$data = [
    ["id" => 1, "name" => 'Tom'],
    ["id" => 2, "name" => 'Fred'],
];
//["id" => $id1, "name" => $name1] = $data[0];
//echo "id = {$id} name = {$name} \n";
foreach ($data as ["id" => $id, "name" => $name]) {
    echo "id = {$id} name = {$name} \n";
}








