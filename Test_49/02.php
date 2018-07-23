<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/20
 * Time: 上午11:12
 */

// 深度優先搜索

class Node
{

    protected $string_;
    protected $weight_;

    public function __construct(string $str, int $weight)
    {
        $this->string_ = $str;
        $this->weight_ = $weight;
    }

    public function getString()
    {
        return $this->string_;
    }

    public function getWeight()
    {
        return $this->weight_;
    }

}

$A = new Node('A', 1);
$B = new Node('B', 3);
$C = new Node('C', 5);
$D = new Node('D', 5);
$E = new Node('E', 7);
$F = new Node('F', 2);
$G = new Node('G', 6);




