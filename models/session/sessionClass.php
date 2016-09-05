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
    // Seconds for the session to expire
    static $session_time_to_expire = 6000;

    static function getLoginPath(){
        return "/EmptyOrchestra/app/login.php";
    }

    static function checkSessionActive(){
        if(isset($_SESSION["user_id"]) && isset($_SESSION["sessionDate"])){
            $now = date("YmdHis");
            if(abs($_SESSION["sessionDate"] - $now)<self::$session_time_to_expire){
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
        if(!isset($_COOKIE["PHPSESSID"])){
            session_start();
        }
        $_SESSION["user_id"] = $idUser;
        $_SESSION["sessionDate"] = date("YmdHis");
    }

    static function redirectToLogin(){
        header("Location: ".self::getLoginPath());
    }
}