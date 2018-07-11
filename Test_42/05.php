<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/2
 * Time: 下午2:12
 */


trait Util {

    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function show() {
        echo 'user_id = ' . $this->user_id;
    }

}

trait Help {

    private $name;
    private $borthday;

    public function __construct($name,$borthday)
    {
        $this->name = $name;
        $this->borthday = $borthday;
    }

    public function say() {
        echo $this->name . '_' . $this->borthday;
    }

}


class PeopleUser {

    use Util,Help;

    public function __construct($name, $borthday)
    {
        Util::__construct($name,$borthday);
        Help::__construct($name);
    }

    public function print() {
        $this->show();
        $this->say();
    }



}


$pu = new PeopleUser('aaa','1996');
$pu->print();
