<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/24
 * Time: 下午2:04
 */


trait One_Test {

    protected $index_;



    public function getInfo() {
        echo $this->id_ . ':' . $this->birthday_ . ':' . $this->index_ . "\n";
    }

}


class Two_Test {

    use One_Test;

    private $id_;
    private $birthday_;

    public function __construct($id,$birthday)
    {
        $this->index_ = 1000;
        $this->id_ = $id;
        $this->birthday_ = $birthday;
    }



}

$two_test = new Two_Test(3,'1996-12-24');
$two_test->getInfo();