<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 17:54
 */
session_start();

include_once("../config/mysql/connection.php");
include_once("../models/menu/quoteClass.php");
$quoteClass = new quoteClass($mysql_link);
$quoteClass->getRandomQuote();

include_once("../models/player/playlistClass.php");
$playlist = new Playlist($mysql_link, 0, "all");
$playlist->loadSongs();

include_once("../html/playlistView.php");