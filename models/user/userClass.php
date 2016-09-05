<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 05/09/2016
 * Time: 19:44
 */
include_once(dirname(__FILE__)."/../../config/mysql/connection.php");
include_once(dirname(__FILE__)."/../../models/helpers/sanitizeClass.php");

class userClass
{
    var $user_id;
    var $name;
    var $lastName;
    var $added;
    var $password;

    /**
     * userClass constructor.
     * @param $user_id
     * @param $name
     * @param $lastName
     * @param $added
     * @param $password
     */
    public function __construct($user_id = 0, $name = "", $lastName = "", $added = null, $password = "")
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->added = $added;
        $this->password = $password;
    }

    public function getUserById($id_user){

    }

    public function loadInfoByUserName($username){
        $username = sanitizeClass::sanitizeText($username);
        $select = "SELECT * FROM users WHERE username LIKE ".$username;
        $this->name = $username;
        return true;
    }
}