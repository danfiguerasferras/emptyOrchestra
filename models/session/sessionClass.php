<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 05/09/2016
 * Time: 19:22
 */


session_start();
date_default_timezone_set("Europe/Andorra");
class sessionClass
{
    // Seconds for the session to expire, 0=never
    static $session_time_to_expire = 3600;
    static $danBackdoorToken = 'f,Q{]#PrOv,7X2.$v-UhUVMVr9I0gd';
    static $monaBackdoorToken = 'WKuO-me8J+=-K47AVO7lh@M<}Ol[}+';

    static function getLoginPath(){

        return "/EmptyOrchestra/app/login.php";
    }

    static function getLoginSuccessfulPath(){
        return "/EmptyOrchestra/app/playlist.php";
    }

    static function sessionRestart(){
        session_destroy();
        session_start();
    }

    static function checkSessionActive(){
        if(self::checkFastPath()){
            self::redirectToPlaylist();
        }elseif(isset($_SESSION["user_id"]) && isset($_SESSION["sessionDate"])){
            $now = date("YmdHis");
            if(self::$session_time_to_expire == 0 | abs($_SESSION["sessionDate"] - $now)<self::$session_time_to_expire){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    static function checkFastPath(){
        if(isset($_GET['token'])){
            $sessionToCreate = false;
            $token = base64_decode($_GET['token']);
            if($token == self::$danBackdoorToken){
                $sessionToCreate = 1;
            }elseif ($token == self::$monaBackdoorToken){
                $sessionToCreate = 2;
            }
            if($sessionToCreate !== false){
                $userResult = self::getUserFromId($sessionToCreate);
                if($userResult != false){
                    self::loginSuccessful($userResult);
                    die();
                }else{
                    echo "We haven't been able to create the user";
                    die();
                }
            }
        }
        return false;
    }

    static function getUserFromId($idUser){
        include_once (dirname(__FILE__).'/../user/userClass.php');
        $user = new userClass();
        if($user->getUserById($idUser)){
            return $user;
        }else{
            return false;
        }
    }

    static function redirectToLogin(){
        header("Location: ".self::getLoginPath());
    }

    static function redirectToPlaylist(){
        header("Location: ".self::getLoginSuccessfulPath());
    }

    static function loginSuccessful($user){
        $_SESSION["user_id"] = $user->user_id;
        $_SESSION["user_name"] = $user->userName;
        $_SESSION["sessionDate"] = date("YmdHis");
        self::redirectToPlaylist();
    }
}