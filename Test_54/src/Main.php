<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/19
 * Time: 下午11:40
 */

namespace src;

require_once "BaseHandler.php";
require_once "LoggerHandler.php";


$loggerHandler = new LoggerHandler(45,"love");
$loggerHandler->show();