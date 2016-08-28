<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 27/08/2016
 * Time: 23:34
 */

class Album{
    var $id_album = 0;
    var $name = "";
    var $added = null;

    /**
     * Album constructor.
     * @param int $id_album
     * @param string $name
     * @param null $added
     */
    public function __construct($id_album, $name, $added)
    {
        $this->id_album = $id_album;
        $this->name = $name;
        $this->added = $added;
    }

    /**
     * @return int
     */
    public function getIdAlbum()
    {
        return $this->id_album;
    }

    /**
     * @param int $id_album
     */
    public function setIdAlbum($id_album)
    {
        $this->id_album = $id_album;
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