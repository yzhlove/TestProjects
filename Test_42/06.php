<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/2
 * Time: 下午5:12
 */

trait OneTest {

    protected $tag;

    public function __construct()
    {
        $this->tag = 'one';
    }

}

trait TwoTest {
    protected $name;

    public function __construct()
    {
        $this->name = 'ha_ha_ha';
    }
}

class TNumberTest {

    use OneTest,TwoTest;

    public function __construct()
    {

    }

    public function show() {
        echo $this->name . '_' . $this->tag;
    }

}

$t_n_t = new TNumberTest();
$t_n_t->show();