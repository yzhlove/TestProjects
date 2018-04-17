<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/4/16
 * Time: 下午9:10
 */

# sha1_mac算法

/**
 * @使用HMAC-SHA1算法生成oauth_signature签名值
 *
 * @param $key  密钥
 * @param $str  源串
 *
 * @return 签名值
 */

function get_signature($str, $key)
{
    $signature = "";
    if (function_exists('hash_hmac')) {
        $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
    } else {
        $blocksize = 64;
        $hashfunc = 'sha1';
        if (strlen($key) > $blocksize)
        {
            $key = pack('H *', $hashfunc($key));
        }
        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        $hmac = pack('H *', $hashfunc(($key ^ $opad) . pack('H * ', $hashfunc(($key ^ $ipad) . $str))));
        $signature = base64_encode($hmac);
    }

    return $signature;
}


$result = get_signature(4,2);
echo "resulr = " . $result;





