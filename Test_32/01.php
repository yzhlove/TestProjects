<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/19
 * Time: 下午2:23
 */

# php 对象自定义排序

class Test {

    public $a;
    public $b;
    public $c;

    public function sortType(Test $obj_1,Test $obj_2) {

        if ($obj_1->b < $obj_2->b)
            return -1;
        if ($obj_1->b > $obj_2->b)
            return 1;
        return 0;
    }

}





$object_list = [];
for ($i = 0;$i < 10;$i++)
{
    $test = new Test();
    $test->a = mt_rand(0,10);
    $test->b = mt_rand(10,100);
    $test->c = mt_rand(100,1000);
    $object_list[] = $test;
}

foreach ($object_list as $list)
    echo $list->a . "-" . $list->b . "-" . $list->c . "\n";

$ts = new Test();

usort($object_list,[$ts,'sortType']);

echo "-------------------\n";

foreach ($object_list as $list)
    echo $list->a . "-" . $list->b . "-" . $list->c . "\n";








