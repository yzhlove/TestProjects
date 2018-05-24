<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/19
 * Time: 下午12:59
 */

class BTest {

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "name =>" . $name;
        echo "\n";
        var_dump($arguments);
    }

    public function get($name) {
        echo "get-name=>".$name."\n";
    }

}

$bt = new BTest();
$bt->get("fuck");
$bt->luck("love","xjj");
$bt->shift();