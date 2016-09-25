<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 04/09/2016
 * Time: 11:42
 */
include_once(dirname(__FILE__)."/../session/sessionClass.php");
class quoteClass
{
    var $quote_id;
    var $value;
    var $added;
    private $mysqli;
    static protected $sessionLimitTime = 3600; /* Seconds until you can get next quote */

    /**
     * quoteClass constructor.
     * @param $quote_id
     * @param $value
     * @param $added
     */
    public function __construct($mysqli = null, $quote_id = 0, $value = "", $added = null)
    {
        if($mysqli == null){
            $mysql_link = null;
            include_once(dirname(__FILE__)."/../../config/mysql/connection.php");
            $this->mysqli = $mysql_link;
        }
        $this->mysqli = $mysqli;
        $this->quote_id = $quote_id;
        $this->value = $value;
        $this->added = $added;
    }

    function countQuotes()
    {
        $select = "SELECT COUNT(*) as total FROM quotes";
        if ($res = $this->mysqli->query($select)) {
            if($row = $res->fetch_array()){
                return $row["total"];
            }else{
                echo "Empty Result";
                return 0;
            }
        } else {
            echo "Empty Result";
            return 0;
        }
    }

    function getAssignedQuote()
    {
        if(isset($_SESSION["user_id"])){
            $limitTime = time() - self::$sessionLimitTime;
            $now = date("Y-m-d H:i:s");
            $timeAsString = date("Y-m-d H:i:s", $limitTime);
            $select = 'SELECT quote_id FROM users_quotes WHERE user_id = '.$_SESSION["user_id"].' AND added BETWEEN "'.$timeAsString.'" AND "'.$now.'" ORDER BY added DESC LIMIT 1';
            if ($res = $this->mysqli->query($select)){
                if($row = $res->fetch_array()){
                    return $row["quote_id"];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
    }

    function getQuoteInformation($quote_id){
        $select = "SELECT * FROM quotes WHERE quote_id = ".$quote_id;
        if ($res = $this->mysqli->query($select)) {
            if($row = $res->fetch_array()) {
                /* Define the quote values */
                $this->quote_id = $row["quote_id"];
                $this->value = $row["value"];
                $this->added = $row["added"];
                return true;
            }else{
                return false;
            }
        }else{
            echo "oh oh...";
            var_dump($quote_id);
            return false;
            die();
        }
    }

    function getQuoteIdFromRandom(){
        $total = $this->countQuotes();
        $quoteNumber = rand(0, ($total-1));
        $select = "SELECT quote_id from quotes LIMIT ".$quoteNumber.", 1";
        if ($res = $this->mysqli->query($select)) {
            $row = $res->fetch_array();
            return $row["quote_id"];
        }else{
            echo "OMG... You broke it";
            die();
        }
    }

    function registerQuoteInDB($id_quote){
        if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!= null) {
            $insert = 'INSERT INTO users_quotes (user_id, quote_id) VALUES ("' . $_SESSION["user_id"] . '","' . $id_quote . '")';
            if (!$this->mysqli->query($insert)) {
                error_log($this->mysqli->error);
            }
        }else{
            error_log("no debería estar aquí");
        }
    }

    function getRandomQuote()
    {
        $actualQuote = $this->getAssignedQuote();
        if (!$actualQuote) {
            $selectedQuoteId = $this->getQuoteIdFromRandom();
            if($this->getQuoteInformation($selectedQuoteId)){
                $this->registerQuoteInDB($this->quote_id);
                $_SESSION["actualQuote"] = $this->quote_id;
                $_SESSION["quoteTime"] = time();
                return $this;
            }else{
                echo "Something went terribly wrong...";
                die();
            }
        }else{
            $this->getQuoteInformation($actualQuote);
            return $this;
        }
        return $this;
    }

    function getSeenQuotes($user_id_select = null){
        if($user_id_select == null){
            if(isset($_SESSION['user_id'])){
                $user_id_select = $_SESSION['user_id'];
            }else{
                $user_id_select = 0;
            }
        }
        $sql = 'SELECT quote_id as actual_quote, value, added,  
        (SELECT COUNT(*) FROM users_quotes uq WHERE uq.quote_id = q.quote_id AND uq.user_id = '.$user_id_select.') as timesSeen
        FROM quotes q';
        if ($res = $this->mysqli->query($sql)) {
            $totalQuotes = array();
            while($row = $res->fetch_array()) {
                $totalQuotes[] = [
                    "actual_quote" => $row['actual_quote'],
                    "value" => $row['value'],
                    "added" => $row['added'],
                    "timesSeen" => intval($row['timesSeen'])
                ];
            }
            return $totalQuotes;
        }else{
            echo "OMG... You broke it... Again!";
            die();
        }
    }
}