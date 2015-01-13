<?php

/**
*descript:随机生成验证码
*$type:验证码的类型 1:数字 2:大小写字母 3:数字+大小写字母 $length:验证码的长度
*@return 验证码字符串
*/
function buildRandomString($type = 1, $length = 4)
{
    if ($type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($type == 2) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($type == 3) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
    }
    if ($length > strlen($chars)) {
        exit("length is not enough");
    }
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}
