<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $flight;
    
    public function setUp() {
        // Load CI instance normally
        $this -> flight = new FlightEntity;
        $this -> flight -> uniqueId = "a123";
        $this -> CI = &get_instance();
    }
    public function testFlightUniqueIdA1() {
        $this -> flight -> uniqueId = "a1";
        $this -> assertEquals('a1', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdA2() {
        $this -> flight -> uniqueId = "a2";
        $this -> assertEquals('a2', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdB1() {
        $this -> flight -> uniqueId = "b1";
        $this -> assertEquals('a123', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdNoLetter() {
        $this -> flight -> uniqueId = "1234";
        $this -> assertEquals('a123', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdDoesntStartWithNumber() {
        $this -> flight -> uniqueId = "a";
        $this ->assertEquals('a123', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdTooManyAs() {
        $this -> flight -> uniqueId = "aaaa12";
        $this ->assertEquals('a123', $this -> flight -> uniqueId);
    }
    public function testFlightUniqueIdNoTrailingNumber() {
        $this -> flight -> uniqueId = "a";
        $this -> assertEquals('a123', $this -> flight -> uniqueId);    
    }
    public function testFlightUniqueIdUnderscoreMiddle() {
        $this -> flight -> uniqueId = "a_1";
        $this -> assertEquals('a123', $this -> flight -> uniqueId);    
    }
}