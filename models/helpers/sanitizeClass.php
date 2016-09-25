<?php

/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 05/09/2016
 * Time: 21:11
 */
class sanitizeClass
{
    static function sanitizeText($string){
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
    
    static function getThat(){
        return 3;
    }
}