<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/4
 * Time: 上午10:48
 */

// 条件查询辅助类

class SearchHelp
{

    private $_site;
    private $_opts;

    private static $_special_rule = ['price' => 'order'];
    private $_basic_search_queue = [];
    private $_special_search_queue = [];
    private $_conditions = [];
    private $_binds = [];

    public function __construct($opts = null, $site = 0)
    {
        $this->_site = $site;
        $this->_opts = $opts;
    }

    public function change()
    {
        if (!is_array($this->_opts))
            return false;
        foreach ($this->_opts as $search_cond => $search_value) {
//            echo "$search_cond => $search_value \n";
            if (empty($search_value))
                continue;
            if (array_key_exists($search_cond, self::$_special_rule))
                $this->_special_search_queue[$search_cond] = $search_value;
            else
                $this->_basic_search_queue[$search_cond] = $search_value;
        }
        return true;
    }

    public function append()
    {
        if (!$this->change())
            return false;
        foreach ($this->_basic_search_queue as $search_cond => $search_value) {
            $this->_conditions[] = " $search_cond = :$search_cond: ";
            $this->_binds[$search_cond] = $search_value;
        }

    }

}

/* 伪造数据 */
// select * from brands where id in (2,3,4) and name in('hello' ,'123');

$opts = [
    'id' => "2,3,4",
    'name' => 'hello,123',
];



$search_help = new SearchHelp($opts);
$search_help->append();




