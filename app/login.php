<?php
include_once(dirname(__FILE__)."/../models/session/sessionClass.php");
include_once(dirname(__FILE__)."/../config/captcha/captchaClass.php");
include_once(dirname(__FILE__)."/../models/user/userClass.php");
if(isset($_POST["g-recaptcha-response"])) {
    if(1 || captchaClass::isItAHuman($_POST["g-recaptcha-response"])){
        $user = new userClass();
        if(isset($_POST["user"]) && $_POST["user"] != null && $user->loadInfoByUserName($_POST["user"])){
            echo $user->name;
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
}

