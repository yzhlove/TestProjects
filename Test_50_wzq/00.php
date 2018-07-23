<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/21
 * Time: 下午4:45
 */

class Point
{

    public $x_;
    public $y_;
    public $score_;

    public function __construct(int $x, int $y)
    {
        $this->x_ = $x;
        $this->y_ = $y;
    }

    public function setScore(int $score) {
        $this->score_ = $score;
    }

    public function getScore() : int {
        return $this->score_;
    }

    public function __toString()
    {
        return "{$this->x_}:{$this->y_} => {$this->score_}";
    }

}
