<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/17
 * Time: 下午3:44
 */

# php 继承与模式方法

class TestOne {

    protected $_string_one ;

    public function __construct($value)
    {
        $this->_string_one = $value;
    }

    public function __call($name, $arguments)
    {
        if ("getStringTwo" == $name) {
            echo "getStringTwo:" .  $this->_string_two . "\n";
        }
        echo "one:" . $name . '=>' . implode(':',array_values($arguments)) . "\n";
    }

}

class TestTwo extends TestOne {

    protected $_string_two;

    public function __construct($value1,$value2)
    {
        parent::__construct($value1);
        $this->_string_two = $value2;
    }

}


$ts1 = new TestTwo("love","yeah");
//$ts1->show("one","two");
$ts1->getStringTwo("what");