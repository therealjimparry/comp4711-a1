<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class PlaneTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $plane;
    
    public function setUp() {
        // Load CI instance normally
        $this -> CI = &get_instance();
        $this -> plane = new PlaneEntity;
        $this -> plane -> uniqueId = "a123";
        $this -> plane -> id = "avanti";
    }
    public function testPlaneUniqueIdA1() {
        $this -> plane -> uniqueId = "a1";
        $this -> assertEquals('a1', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdA2() {
        $this -> plane -> uniqueId = "a2";
        $this -> assertEquals('a2', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdB1() {
        $this -> plane -> uniqueId = "b1";
        $this -> assertEquals('a123', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdNoLetter() {
        $this -> plane -> uniqueId = "1234";
        $this -> assertEquals('a123', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdDoesntStartWithNumber() {
        $this -> plane -> uniqueId = "a";
        $this ->assertEquals('a123', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdTooManyAs() {
        $this -> plane -> uniqueId = "aaaa12";
        $this ->assertEquals('a123', $this -> plane -> uniqueId);
    }
    public function testPlaneUniqueIdNoTrailingNumber() {
        $this -> plane -> uniqueId = "a";
        $this -> assertEquals('a123', $this -> plane -> uniqueId);    
    }
    public function testPlaneUniqueIdUnderscoreMiddle() {
        $this -> plane -> uniqueId = "a_1";
        $this -> assertEquals('a123', $this -> plane -> uniqueId);    
    }
}