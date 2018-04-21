<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/20
 * Time: 下午9:20
 */

class Test {

    public $_name;
    protected $_age;
    private $_birtyday;

    public function __construct($name = 'yzh')
    {
        $this->_name = $name;
    }

    public function show() {
        echo "show_name = " . $this->_name;
    }

}

$ts = new Test();
$r = new ReflectionClass($ts);
print_r($r->getConstants());
print_r($r->getProperties());
print_r($r->getMethods());
