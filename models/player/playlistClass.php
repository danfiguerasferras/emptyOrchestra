<?php

include_once(dirname(__FILE__)."/songClass.php");
include_once(dirname(__FILE__)."/albumClass.php");
include_once(dirname(__FILE__)."/singerClass.php");

class Playlist
{
    var $playlist_id = 0;
    var $name = "";
    var $songs = array();
    private $mysqli;

    /**
     * Playlist constructor.
     * @param int $playlist_id
     * @param string $name
     */
    public function __construct($mysqli, $playlist_id = 0, $name = "")
    {
        $this->playlist_id = $playlist_id;
        $this->name = $name;
        $this->mysqli = $mysqli;
    }

    /**
     * @return int
     */
    public function getPlaylistId()
    {
        return $this->playlist_id;
    }

    /**
     * @param int $playlist_id
     */
    public function setPlaylistId($playlist_id)
    {
        $this->playlist_id = $playlist_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    public function setSongs($songs)
    {
        $this->songs = $songs;
    }

    public function addSong($songToAdd)
    {
        array_push($this->songs, $songToAdd);
    }

    public function loadSongs(){
        $select = "
        SELECT songs.*, albums.id_album, albums.name as name_album, albums.added as added_album, singers.id_singer, singers.name as name_singer, singers.added as added_singer
        FROM songs
        INNER JOIN singers ON singers.id_singer = songs.singer
        INNER JOIN albums ON albums.id_album = songs.album";
        if($this->playlist_id!=0){
            // TODO add a filter for playlists
        }
        // Sorting the song
        $select .= " ORDER BY songs.added ASC";
        if($res = $this->mysqli->query($select)){
            while ($row = $res->fetch_array()){
                $album = new Album($row["id_album"], $row["name_album"], $row["added_album"]);
                $singer = new Singer($row["id_singer"], $row["name_singer"], $row["added_singer"]);
                $song = new Song($row["id_song"], $row["name"], $singer, $album, $row["file_name"], $row["favorite"], $row["added"]);
                $this->addSong($song);
            }
            $res->close();
        }else{
            echo "error wtf? O.O";
            die();
        }
    }
}