<?php
include_once(dirname(__FILE__)."/../models/session/sessionClass.php");
sessionClass::sessionRestart();
include_once(dirname(__FILE__)."/../config/captcha/captchaClass.php");
if(isset($_POST["g-recaptcha-response"])) {
    if(captchaClass::isItAHuman($_POST["g-recaptcha-response"])){
        include_once(dirname(__FILE__)."/../config/mysql/connection.php");
        include_once(dirname(__FILE__)."/../models/user/userClass.php");
        include_once(dirname(__FILE__)."/../models/security/passwordClass.php");
        $user = new userClass($mysql_link);

        if(isset($_POST["user"]) && $_POST["user"] != null && $user->loadInfoByUserName(strtolower($_POST["user"]))){
            if(passwordClass::verifyPassword($_POST["password"], $user->password)){
                sessionClass::loginSuccessful($user);
            }else{
                $_SESSION["loginError"] = true;
                sessionClass::redirectToLogin();
            }
        }else{
            $_SESSION["loginError"] = true;
            sessionClass::redirectToLogin();
        }
    }else{
        $_SESSION["loginError"] = true;
        sessionClass::redirectToLogin();
    }
}else{
    include_once(dirname(__FILE__)."/../html/login.php");
    $_SESSION["loginError"] = false;
}