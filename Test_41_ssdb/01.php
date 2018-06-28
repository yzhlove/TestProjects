<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/6/28
 * Time: 上午10:47
 */


try {
    $ssdb = new SimpleSSDB('127.0.0.1',8888);
} catch (SSDBException $e) {
    echo $e->getMessage();
}
$ret = $ssdb->set('yzh','love');
if ($ret  === false) {
    echo 'ssdb error !';
} else {
    echo $ssdb->get('yzh');
}

