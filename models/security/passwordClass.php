<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 06/09/2016
 * Time: 19:37
 */
class passwordClass
{
    public static $encryptMethod = PASSWORD_BCRYPT;
    public static $cost = 8;

    public static function encryptPassword($value){
        $result = password_hash($value, self::$encryptMethod, self::getEncryptOptions());
        return $result;
    }

    public static function getEncryptOptions(){
        $result = [
            'cost' => self::$cost
        ];
        return $result;
    }

    public static function verifyPassword($password, $hash){
        if(password_verify($password, $hash)){
            return true;
        }else{
            return false;
        }
    }
}