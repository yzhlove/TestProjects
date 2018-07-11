<?php


/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/30
 * Time: 下午3:04
 */


namespace yzh {




    class DataModel
    {

        public static function findById()
        {
            try {
                $class_name = get_called_class();
                $ref_args = func_get_args();

                $class_instance = new \ReflectionClass($class_name);

               $obj =  $class_instance->newInstanceArgs((array) $ref_args);
            } catch (\Exception $e) {
                echo 'Exception::' . $e->getMessage();
            }
            return $obj;
        }

    }

}

namespace xjj {

    use yzh\DataModel;

    class User extends DataModel
    {

        private $id;

//        public function __construct($id)
//        {
//            $this->id = $id;
//        }

//    public function __construct()
//    {
//    }

        public function show()
        {
            echo 'user->id ' . $this->id;
        }

    }

    class Room extends DataModel
    {

        private $id;
        private $description;

        public function __construct($id, $description)
        {
            $this->id = $id;
            $this->description = $description;
        }

        public function show()
        {
            echo 'room:', 'room->id:' . $this->id, ' room->description:' . $this->description;
        }
    }

    $user = User::findById();
    $user->show();
    $room = Room::findById(1,'room_instance');
    $room->show();
}


