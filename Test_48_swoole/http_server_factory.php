<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/18
 * Time: 下午5:41
 */

class ObjectFactory {

    public static $instance_;

    private $pool_;

    public function __construct()
    {
        self::$instance_ = $this;
    }

    public static function getInstance() {
        if (is_null(self::$instance_))
            new ObjectFactory();
        return self::$instance_;
    }

    public function getController($class) {
        if (isset($this->pool_[$class])) {
            if (count($this->pool_[$class]) > 0) {
                $controller = $this->pool_[$class]->shift();
                $controller->init();
                $controller->poolName = $class;
                return $controller;
            }
        } else {
            $this->pool_[$class] = new SplQueue();
        }
        if (!class_exists($class)) {
            throw new RuntimeException('class not found::' . $class);
        }
        $object = new $class;
        return $object;
    }

   public function giveBack($controller) {
        if ($controller->destory())
            $this->pool_[$controller->poolName]->push($controller);
   }


   public function count() {
        if (is_null($this->pool_))
            return 0;
        echo "========== 對象池計算 ========== \n";
        echo "對象類型總數:" . count($this->pool_) . "\n";
        foreach ($this->pool_ as $key => $object) {
            echo "key:{$key} values: " . count($object) . "\n";
        }
        echo "========== 對象池計算 ========== \n";
   }

}


class Context {

    private $request_;
    private $response_;
    private $hasOver_;
    private $controller_;

    public function __construct(swoole_http_request $request,swoole_http_response $response,$controller)
    {
        $this->request_ = $request;
        $this->response_ = $response;
        $this->hasOver_ = false;
        $this->controller_ = $controller;
    }

    public function send(string $string) {
        if ($this->over()) {

        }
    }

    public function over() {
        return $this->hasOver_;
    }

}