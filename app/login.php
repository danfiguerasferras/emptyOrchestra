<?php

include_once("../config/captcha/captchaClass.php");

if(isset($_POST["g-recaptcha-response"])) {
    var_dump(captchaClass::isItAHuman($_POST["g-recaptcha-response"]));
}else{
    include_once("../html/login.php");
}