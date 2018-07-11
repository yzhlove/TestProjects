<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/30
 * Time: 下午2:26
 */

class ParentTest {

    public static function finnById($id) {
        echo 'parentTest::findById ';
    }

    public function findId($id) {

    }

}

class ChildTest extends ParentTest {


    public static function finnById($id,$num)
    {
        echo 'childTest::findById ';
    }

}





