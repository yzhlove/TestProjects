<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/30
 * Time: 下午3:17
 */




/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/30
 * Time: 下午3:04
 */


namespace yzh {

    class DataModel {

        public static function findById() {

            {
                try{

                    $class_name = get_called_class();
                    if (method_exists($class_name,  '__construct') === false)
                    {
                        exit("Constructor for the class <strong>$class_name</strong> does not exist, you should not pass arguments to the constructor of this class!");
                    }
                    $re_args = func_get_args();

                    $refClass = new \ReflectionClass($class_name);
                    $class_instance = $refClass->newInstanceArgs((array) $re_args);
                }catch (\Exception $e) {
                    echo 'Exception:: new Instance Error!';
                }
                return $class_instance;
            }
        }

    }

}

namespace xjj {

    use yzh\DataModel;

    class User extends DataModel {

        private $id;

        public function __construct($id)
        {
            $this->id = $id;
        }

        public function show() {
            echo 'user->id ' . $this->id;
        }

    }

    class Room extends DataModel {

        private $id;
        private $description;

        public function __construct($id,$description)
        {
            $this->id = $id;
            $this->description = $description;
        }

        public function show() {
            echo 'room:' , 'room->id:' . $this->id, ' room->description:' . $this->description;
        }
    }

    $user = User::findById(1);
    $user->show();
//    $room = Room::findById(1,'room_instance');
//    $room->show();
}


