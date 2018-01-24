<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午10:17
 */

/* redis例子 */

class RedisDataBase
{

    private $db_conn;

    public function __construct()
    {

        $host = "host=127.0.0.1";
        $port = "port=5432";
        $db_name = "dbname=game_development";
        $user = "user=postgres";
        $this->db_conn = @pg_connect("$host $port $db_name $user");
    }

    public function is_connection()
    {
        if ($this->db_conn)
            return true;
        else
            return false;
    }

    public function get_sql($string)
    {
        $sql = <<<EOF
        $string
EOF;
        return $sql;
    }

    public function query($sql, $length)
    {

        $ret = pg_query($this->db_conn, $sql);
        $reset = [];
        if ($ret) {
            while ($row = pg_fetch_row($ret)) {
                $obj = [];
                for ($i = 0; $i != $length; $i++)
                    $obj[] = $row[$i];
                $reset[] = $obj;
            }
            return $reset;
        }
        return false;
    }

}

$redis_db = new RedisDataBase();

if ($redis_db->is_connection()) {

    $sql = $redis_db->get_sql("select * from game_users");
    $result = $redis_db->query($sql,5);

    var_dump($result);

} else {
    echo "database connect is failure!";
}






