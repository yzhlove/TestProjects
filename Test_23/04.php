<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/8
 * Time: 下午3:47
 */
swoole_timer_after(2000,function () {

    echo "hello";

    swoole_timer_after(2000,function (){

        echo "world";

    });

});


