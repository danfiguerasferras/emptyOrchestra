<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 17:54
 */

include_once("../config/mysql/connection.php");
include_once("../models/playlistClass.php");
$playlist = new Playlist(0, "all");
$playlist->loadSongs($mysql_link);
include_once("../html/playlistView.php");