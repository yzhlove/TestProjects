<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 下午4:27
 */

/* redis例子 */

class DbUtil_Help
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






