<?php
include_once "../config/environment/environmentClass.php";
var_dump(environmentClass::isPro());
echo $_SERVER['REMOTE_ADDR'];