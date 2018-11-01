<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/11/1
 * Time: 11:05 AM
 */

namespace src;

class BaseGame {

    protected $prams ;

    public function __construct(array $values = array())
    {
        $this->prams = $values;
    }



}
