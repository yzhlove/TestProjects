<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/24
 * Time: 下午5:49
 */

class Base {

    protected $_value;

    public function __construct($value)
    {
        $this->_value = $value;
    }

    public function get() {
        return $this->_value;
    }

}

class Simple extends Base {

    public function __construct($value)
    {
        parent::__construct($value);
    }

    public function show() {
        echo $this->get() . "\n";
    }
}

$s = new Simple(100);
$s->show();