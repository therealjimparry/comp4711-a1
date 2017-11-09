<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightTest extends PHPUnit_Framework_TestCase {
    private $CI;
    public function setUp() {
        // Load CI instance normally
        $this->CI = &get_instance();
    }
    public function testTrivial() {
        $this->assertEquals('bar', 'bar');
    }
}