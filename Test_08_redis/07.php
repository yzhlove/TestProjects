<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午11:03
 */
require_once "06.php";

/* php redis操作 */

$db_contol = new RedisDataBase();
if ($db_contol->is_connection()) {

    $sql = $db_contol->get_sql("select * from game_users where id = 1");
    $result = $db_contol->query($sql,5);

    if ($result) {

        $string_data = json_encode($result,JSON_FORCE_OBJECT);

        //存储进redis
        $redis = new Redis();
        $redis->connect("127.0.0.1",6379);

        $status = $redis->set("game_user:1",$string_data);

        // 从redis获取
        $str_obj = $redis->get("game_user:1");

        echo "string_obj = $str_obj \n";

    }
}
