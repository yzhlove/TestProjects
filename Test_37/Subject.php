<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/22
 * Time: 上午10:22
 */

abstract class Observer {
    protected $subject;
    public abstract function update() ;
}

class Subject {

    private $ArrayList = [];
    private $state ;

    public function setValue($state) {
        $this->state = $state;
        $this->notify();
    }

    public function getValue() {
        return $this->state;
    }

    public function attach(Observer $os) {
        $this->ArrayList[] = $os;
    }

    public function notify() {
        foreach ($this->ArrayList as $obs) {
            $obs->update();
        }
    }

}

class BinaryObserver extends Observer {

    public function __construct(Subject $sb)
    {
        $this->subject = $sb;
        $this->subject->attach($this);
    }

    public function update()
    {
        echo "BinaryObserver\n";
    }
}

class OctObserver extends Observer {

    public function __construct(Subject $sb)
    {
        $this->subject = $sb;
        $this->subject->attach($this);
    }

    public function update()
    {
        echo "OctObserver\n";
    }
}

class HexObserver extends Observer {

    public function __construct(Subject $sb)
    {
        $this->subject = $sb;
        $this->subject->attach($this);
    }

    public function update()
    {
        echo "HexObserver\n";
    }
}

$subject = new Subject();
new BinaryObserver($subject);
new OctObserver($subject);
new HexObserver($subject);

$subject->setValue(100);
echo "--------\n";
$subject->setValue(150);



