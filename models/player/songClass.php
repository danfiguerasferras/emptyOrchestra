<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 27/08/2016
 * Time: 23:26
 */

class Song{
    var $id_song = 0;
    var $name = "";
    var $singer = null;
    var $album = null;
    var $file_name = "";
    var $favorite = false;
    var $added = null;

    /**
     * Song constructor.
     * @param int $id_song
     * @param string $name
     * @param null $singer
     * @param null $album
     * @param string $file_name
     * @param bool $favorite
     * @param null $added
     */
    public function __construct($id_song = 0, $name = "", $singer = null, $album = null, $file_name = "", $favorite = false, $added = null)
    {
        $this->id_song = $id_song;
        $this->name = $name;
        $this->singer = $singer;
        $this->album = $album;
        $this->file_name = $file_name;
        $this->favorite = $favorite;
        $this->added = $added;
    }

    /**
     * @return int
     */
    public function getIdSong()
    {
        return $this->id_song;
    }

    /**
     * @param int $id_song
     */
    public function setIdSong($id_song)
    {
        $this->id_song = $id_song;
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
     * @return null
     */
    public function getSinger()
    {
        return $this->singer;
    }

    /**
     * @param null $singer
     */
    public function setSinger($singer)
    {
        $this->singer = $singer;
    }

    /**
     * @return null
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param null $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     */
    public function setFilename($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return boolean
     */
    public function isFavorite()
    {
        return $this->favorite;
    }

    /**
     * @param boolean $favorite
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * @return null
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @param null $added
     */
    public function setAdded($added)
    {
        $this->added = $added;
    }



}