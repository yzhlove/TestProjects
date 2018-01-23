<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/23
 * Time: 上午9:53
 */

/* php 反射 */

//redis 中的所有方法
$class = new ReflectionClass("Redis");
file_put_contents("redis.txt",$class->getMethods());
