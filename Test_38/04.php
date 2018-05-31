<?php

/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/5/29
 * Time: 下午7:24
 */
class User
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function __call($name, $arguments)
    {
        $prefix = substr($name, 0, 3);
        $type = lcfirst(substr($name, 3));
        echo "prefix = " . $prefix . " type = " . $type . "\n";
        if ('set' == $prefix) {
            $this->$type = $arguments[0];
        } elseif ('get' == $prefix) {
            return $this->$type;
        }
        return false;
    }

}

# 拿到每个人的骰子点数
//public function getUsersPoint($data) {
//    $type_list = [1 => 'one',2 => 'two',3 => 'three',4 => 'four',5 => 'five',6 => 'six'];
//    $users = $this->showUsers();
//    $users_point = [];
//    foreach ($users as $user) {
//        $one = $user->one;
//        if (!$one) $one = 0;
//        $type = $type_list[$data['point']];
//        if ($user->$type)
//            $one += $user->$type;
//        $users_point[] = ['user_id' => $user->user_id,$type => $one];
//    }
//    return $users_point;
//}

$us1 = new User(1);
$us2 = new User(2);
$us3 = new User(3);

$us1->setOne(3);
$us1->setSix(6);
$us2->setOne(4);
$us2->setFive(2);
$us3->setSix(5);

$data = [
    'point' => 4,
    'num' => 4
];

$users = [$us1, $us2, $us3];

$type_list = [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six'];

echo "\n==================\n";

foreach ($users as $user) {
    $one = $user->getOne();
    $num = 0;
    if ($one) {
        echo "one = " . $one . "\n";
        $num = $one;
    }
    $type = ucfirst($type_list[$data['point']]);
    echo "type = " . $type . "\n";
    $type = "get" . $type;
    if ($user->$type()) {
        echo "type = " . $type . " => " . $user->$type() . "\n";
        $num = $one + $user->$type();
    }


    echo "num = " . $num . "\n";
}
