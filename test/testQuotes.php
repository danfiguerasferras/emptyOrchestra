<?php
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: blader
 * Date: 25/09/16
 * Time: 16:48
 */
class testQuotes extends TestCase
{
    public function testCanCountQuotes(){
        include_once(dirname(__FILE__)."/../models/helpers/sanitizeClass.php");
        $this->assertEquals(3, sanitizeClass::getThat());
    }
}
