<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 27/08/2016
 * Time: 23:41
 */

class Singer{
    var $id_singer = 0;
    var $name = "";
    var $added = null;

    /**
     * Singer constructor.
     * @param int $id_singer
     * @param string $name
     * @param null $added
     */
    public function __construct($id_singer, $name, $added)
    {
        $this->id_singer = $id_singer;
        $this->name = $name;
        $this->added = $added;
    }

    /**
     * @return int
     */
    public function getIdSinger()
    {
        return $this->id_singer;
    }

    /**
     * @param int $id_singer
     */
    public function setIdSinger($id_singer)
    {
        $this->id_singer = $id_singer;
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