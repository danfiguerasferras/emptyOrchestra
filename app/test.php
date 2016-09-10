<?php
include_once "../models/menu/quoteClass.php";
include_once "../config/mysql/connection.php";

$qc = new quoteClass($mysql_link);
$qc->getSeenQuotes(2);