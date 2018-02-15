<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/2/2
 * Time: 下午9:18
 */
/* PHP 设计模式之适配器模式 */

class Whale {
    public function __construct() {
        $this->name = "Whale";
    }
    public function eatFish() {
        echo "Whale eat fish.\n";
    }
}
class Carp {
    public function __construct() {
        $this->name = "Carp";
    }
    public function eatMoss() {
        echo "Carp eat moss.\n";
    }
}

interface Animal {
    function eatFish();
    function eatMoss();
}

class WhaleAdapter extends Whale implements Animal {
    public function __construct() {
        $this->name = "Whale";
    }
    public function eatMoss() {
        echo "Whale don't eat moss.\n";
    }
}
class CarpAdapter extends Carp implements Animal {
    public function __construct() {
        $this->name = "Carp";
    }
    public function eatFish() {
        echo "Carp don't eat moss.\n";
    }
}

$whaleAdapter = new WhaleAdapter();
$whaleAdapter->eatFish();
$whaleAdapter->eatMoss();
$carpAdapter = new CarpAdapter();
$carpAdapter->eatMoss();
$carpAdapter->eatFish();
