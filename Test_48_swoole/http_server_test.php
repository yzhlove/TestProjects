<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/7/18
 * Time: 下午2:29
 */

// 小程序http服務器

namespace http_server;

class HttpServer {

    protected $server_;
    protected $config_;

    public function __construct(array $config)
    {
        $this->server_ = new \swoole_http_server($config['host'],$config['port']);
        $this->config_ = $config;
        $this->setConfig();
    }

    protected function setConfig() {
        $this->server_->set($this->config_['server']);
    }

    public function run() {
        $this->server_->on('request',[$this,'onRequest']);
        $this->server_->start();
    }

    public function onRequest(\swoole_http_request $request,\swoole_http_response $response) {
        var_dump($request);
        $response->end("<h1>Hello World</h1>#" .mt_rand(1000,9999));
    }

}

/* main */

$config = [
    'server' => ['worker_num' => 4,'dispatch_mode' => 3],
    'host' => '0.0.0.0',
    'port' => 8088
];
$http_server = new HttpServer($config);
$http_server->run();

