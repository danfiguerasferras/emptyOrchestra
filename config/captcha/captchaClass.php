<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 04/09/2016
 * Time: 19:42
 */

include_once(dirname(__FILE__)."/../environment/environmentClass.php"); // This would include the library

class captchaClass{

    static function getPrivateKey(){
        if (environmentClass::isLoc()) {
            return "6LdZTikTAAAAAIBFUDf0Rm5yK9DsZ-Z5vdkJCuka";
        } elseif (environmentClass::isPro()) {
            return "6LfhTikTAAAAAGWunuZL-2Wcg-bnXHhC2yrDAhfA";
        } else {
            echo "We cannot define environment in the capcha config...".$_SERVER['REMOTE_ADDR'];
            die();
        }
    }

    static function getPublicKey(){
        if (environmentClass::isLoc()) {
            return "6LdZTikTAAAAAMgkjB7YItrfMOxSCb2rjKZP4QtA";
        } elseif (environmentClass::isPro()) {
            return "6LfhTikTAAAAAPm4Mb7V9rGAonOkyQvvp6Td9jtJ";
        } else {
            echo "We cannot define environment in the capcha config...".$_SERVER['REMOTE_ADDR'];
            die();
        }
    }

    static function isItAHuman($postValue){
        $secret = self::getPrivateKey();
        $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".($secret)."&response=".($postValue));
        $res = json_decode($request);
        if($res->success=="true"){
            return true;
        }else{
            return false;
        }
    }
}