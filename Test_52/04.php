<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/1
 * Time: 下午9:23
 */

interface Logger
{
    function log(?string $msg): string;
}

class Application
{

    private $logger_;

    public function getLogger(): ?Logger
    {
        return $this->logger_;
    }

    public function setLogger(?Logger $logger)
    {
        $this->logger_ = $logger;
    }

}

$app = new Application();
$app->setLogger(new class implements Logger
{
    public function log(?string $msg): string
    {
        return strtolower(md5($msg));
    }
});

$result_msg = $app->getLogger()->log("hello world");
var_dump($result_msg);
var_dump($app->getLogger());
