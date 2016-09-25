<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 17:54
 */
include_once(dirname(__FILE__)."/../models/session/sessionClass.php");
if(!sessionClass::checkSessionActive()){
    sessionClass::redirectToLogin();
    die();
}
include_once(dirname(__FILE__)."/../config/mysql/connection.php");
include_once(dirname(__FILE__)."/../models/menu/quoteClass.php");

$quoteClass = new quoteClass($mysql_link);
$quoteClass->getRandomQuote();
$quotesSeen = $quoteClass->getSeenQuotes();

include_once(dirname(__FILE__)."/../models/player/playlistClass.php");
$playlist = new Playlist($mysql_link, 0, "all");
$playlist->loadSongs();

include_once(dirname(__FILE__)."/../html/playlistView.php");