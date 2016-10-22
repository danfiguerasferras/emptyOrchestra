<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 05/09/2016
 * Time: 19:44
 */

include_once(dirname(__FILE__)."/../../models/helpers/sanitizeClass.php");

class userClass
{
    var $mysqli;
    var $user_id;
    var $userName;
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
    public function __construct($mysqli = null, $user_id = 0, $userName = "", $name = "", $lastName = "", $added = null, $password = "")
    {
        if($mysqli!=null) {
            $this->mysqli = $mysqli;
        }else{
            include_once(dirname(__FILE__)."/../../config/mysql/connection.php");
            if(isset($mysql_link)) {
                $this->mysqli = $mysql_link;
            }
        }
        $this->user_id = $user_id;
        $this->userName = $userName;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->added = $added;
        $this->password = $password;
    }

    public function getUserById($id_user){
        $return = false;
        if($this->mysqli!=null){
            $id_user = sanitizeClass::sanitizeText($id_user);
            $select = 'SELECT * FROM users WHERE user_id = "'.$id_user.'"';
            if ($res = $this->mysqli->query($select)) {
                if($row = $res->fetch_object()) {
                    $this->user_id = $row->user_id;
                    $this->userName = $row->user_name;
                    $this->name = $row->name;
                    $this->lastName = $row->last_name;
                    $this->added = $row->added;
                    $this->password = $row->password;
                    $return = true;
                }
                else{
                    $return = false;
                }
            }else{
                $_SESSION["loginError"] = true;
            }
        }else{
            echo "The MySQL is not available";
            die();
        }
        return $return;
    }

    public function loadInfoByUserName($userName){
        $return = false;
        if($this->mysqli!=null){
            $userName = sanitizeClass::sanitizeText($userName);
            $select = 'SELECT * FROM users WHERE user_name LIKE "'.$userName.'"';
            if ($res = $this->mysqli->query($select)) {
                if($row = $res->fetch_object()) {
                    $this->user_id = $row->user_id;
                    $this->userName = $row->user_name;
                    $this->name = $row->name;
                    $this->lastName = $row->last_name;
                    $this->added = $row->added;
                    $this->password = $row->password;
                    $return = true;
                }
                else{
                    $return = false;
                }
            }else{
                $_SESSION["loginError"] = true;
            }
        }else{
            echo "The MySQL is not available";
            die();
        }
        return $return;
    }
}