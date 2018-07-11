<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/30
 * Time: 下午2:36
 */

class DataMode {

    public static function findById() {

        $class_name = get_called_class();
        $clazz = $class_name .'(' .implode(',',func_get_args()) . ')';
        echo 'clazz = ' , $clazz;
        $object = new $clazz;
        var_dump($object);
    }

}


class User extends DataMode {

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function show() {
        echo 'user->id = ' , $this->id;
    }

}

class Room extends DataMode {

    private $id;
    private $description;

    public function __construct($id,$description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    public function show() {
        echo 'room->id = ' , $this->id, ' room->description = ' , $this->description;
    }

}


User::findById('1');
Room::findById('1','yzh');