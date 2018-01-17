<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/13
 * Time: 下午5:24
 */

class UserHandler extends BaseHandler {

    public function __construct() {
        echo "USerHandler is create ... \n";
    }

    public function HandlerRequest(BaseRequest $request) {

        if ($request->action == "user") {
            echo "\n----------------------\n";
            $request->server->task(["fd"=>$request->fd,"data"=>$request->data]);
        } elseif ($this->nexHandler)
            $this->nexHandler->HandlerRequest($request);
        else
            echo "user: action is error!\n";
    }
}
