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
    var $id_quote;
    var $value;
    var $added;
    private $mysqli;
    static protected $sessionLimitTime = 600; /* Seconds until you can get next quote */

    /**
     * quoteClass constructor.
     * @param $id_quote
     * @param $value
     * @param $added
     */
    public function __construct($mysqli = null, $id_quote = 0, $value = "", $added = null)
    {
        $this->mysqli = $mysqli;
        $this->id_quote = $id_quote;
        $this->value = $value;
        $this->added = $added;
    }

    function countQuotes()
    {
        $select = "SELECT COUNT(*) as total FROM quotes";
        if ($res = $this->mysqli->query($select)) {
            $row = $res->fetch_array();
            return $row["total"];
        } else {
            return 0;
        }
    }

    function didQuoteTimeExpire()
    {
        if(!isset($_SESSION["quoteTime"]) || !isset($_SESSION["actualQuote"])){
            return true;
        }else{
            $currentTime = date("YmdHis");
            if(abs(($_SESSION["quoteTime"] - $currentTime))>self::$sessionLimitTime){
                return true;
            }else{
                return false;
            }
        }
    }

    function getQuoteInformation($id_quote){
        $select = "SELECT * from quotes WHERE id_quote = ".$id_quote;
        if ($res = $this->mysqli->query($select)) {
            $row = $res->fetch_array();
            /* Define the quote values */
            $this->id_quote = $row["id_quote"];
            $this->value = $row["value"];
            $this->added = $row["added"];
            return true;
        }else{
            echo "oh oh...";
            var_dump($id_quote);
            return false;
            die();
        }
    }

    function getQuoteIdFromRandom(){
        $total = $this->countQuotes();
        $quoteNumber = rand(0, ($total-1));
        $select = "SELECT id_quote from quotes LIMIT ".$quoteNumber.", 1";
        if ($res = $this->mysqli->query($select)) {
            $row = $res->fetch_array();
            return $row["id_quote"];
        }else{
            echo "OMG... You broke it";
            die();
        }
    }

    function getRandomQuote()
    {
        if ($this->didQuoteTimeExpire()) {
            $selectedQuoteId = $this->getQuoteIdFromRandom();
            if($this->getQuoteInformation($selectedQuoteId)){
                $_SESSION["actualQuote"] = $this->id_quote;
                $_SESSION["quoteTime"] = date("YmdHis");
                return $this;
            }else{
                echo "Something went terribly wrong...";
                die();
            }
        }else{
            $this->getQuoteInformation($_SESSION["actualQuote"]);
            return $this;
        }
        return $this;
    }
}