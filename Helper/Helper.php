<?php
/**
 * Created by PhpStorm.
 * User: ZhouTengFu
 * Date: 2018/1/17
 * Time: 下午2:04
 */
namespace Helper;

class Helper{

    /**
     * @param $price
     * @param int $digit
     * @return float
     */
    public static function price($price, $digit = 2){
        return round($price,$digit);
    }

    public static function vdump($var){
        var_dump($var);
        exit();
    }

    public static function checkMobile($mobile){
        return preg_match("/^1[3,5,7,8][0-9]{9}$/",$mobile) === 1;
    }

    public static function intValueWithDefault($val, $def=0){
        $val = intval($val);

        return $val?$val:$def;
    }

    public static function genOrderId(){
        return date('YmdHis') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }


    public static function makeUploadPath($dir = ''){
        $path = date("Y/m/d",time());
        if($dir){
            $path = sprintf('up/%s/%s',$dir,$path);
        }else{
            $path = sprintf('up/%s',$path);
        }

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }

        return $path;
    }

    public static function encryptPassword($password,$salt){
        return sha1($salt.$password.$salt);
    }

    /**
     * 获取字符串中的汉字
     * @param $str
     * @return string
     */
    public static function getChinese($str)
    {
        preg_match_all("/./u",$str, $strArr);

        $result = '';
        foreach ($strArr[0] as $k)
        {
            if (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $k))
            {
                $result .= $k;
            }
        }

        return $result;
    }

}