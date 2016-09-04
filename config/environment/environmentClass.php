<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 04/09/2016
 * Time: 19:46
 */
class environmentClass
{
    static protected $localIP = "::1";
    static protected $prodIP = "139.59.159.149";

    static function isLoc(){
        if($_SERVER['REMOTE_ADDR'] == self::$localIP){
            return true;
        }else{
            return false;
        }
    }

    static function isPro(){
        if($_SERVER['REMOTE_ADDR'] == self::$prodIP){
            return true;
        }else{
            return false;
        }
    }
}