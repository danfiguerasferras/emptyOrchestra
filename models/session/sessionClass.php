<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 05/09/2016
 * Time: 19:22
 */

session_start();
class sessionClass
{
    // Seconds for the session to expire, 0=never
    static $session_time_to_expire = 0;

    static function getLoginPath(){

        return "/EmptyOrchestra/app/login.php";
    }

    static function getLoginSuccessfulPath(){
        return "/EmptyOrchestra/app/playlist.php";
    }

    static function checkSessionActive(){
        if(isset($_SESSION["user_id"]) && isset($_SESSION["sessionDate"])){
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

    static function createSession($idUser){
        // Used to check if the session is already created
        session_start();

        $_SESSION["user_id"] = $idUser;
        $_SESSION["sessionDate"] = date("YmdHis");
    }

    static function redirectToLogin(){
        header("Location: ".self::getLoginPath());
    }

    static function loginSuccessful($user){

        $_SESSION["user_id"] = $user->user_id;
        $_SESSION["user_name"] = $user->userName;
        $_SESSION["sessionDate"] = date("YmdHis");
        header("Location: ".self::getLoginSuccessfulPath());
    }
}