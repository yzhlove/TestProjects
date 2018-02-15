<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/3
 * Time: 下午3:13
 */
class Test {

    public function show($one,$two,$three) {
        echo "one = " . $one . "\n";
        echo "two = " . $two . "\n";
        echo "three = " . $three . "\n";
    }

}

$ts = new Test();
//$argument = ["i","love","you"]; //ok
$argument = ['lcm'=>'i',"xjj"=>'love','xyj'=>'you'];    //ok 仅仅只取值
call_user_func_array([$ts,"show"],$argument);

