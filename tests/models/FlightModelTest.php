<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightModelTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $flights;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setUp() {
        // Load CI instance normally
        $this -> CI = &get_instance();
        $this -> flights = $this -> CI -> data['all_flights'];
    }
    
    public function testDestinationAirportsValid() {
        $albatros = WackyAPI::getAlbatros();
        $this->assertEquals("albatros", $albatros['id']);
        foreach ($this -> flights as $flight) {
            $this -> assertContains($flight->destinationAirport, [$albatros['base'], $albatros['dest1'], $albatros['dest2'], $albatros['dest3']]);
        }
    }
    public function testDepartureAirportsValid() {
        $albatros = WackyAPI::getAlbatros();
        $this->assertEquals("albatros", $albatros['id']);
        foreach ($this -> flights as $flight) {
            $this -> assertContains($flight->departureAirport, [$albatros['base'], $albatros['dest1'], $albatros['dest2'], $albatros['dest3']]);
        }
    }
    // public function testPlanesExist() {
        // print_r($this->CI->data);
        // foreach ($this -> flights as $flight) {
            // $this -> assertContains($flight->departureAirport, [$albatros['base'], $albatros['dest1'], $albatros['dest2'], $albatros['dest3']]);
        // }
    // }
    // public function testArrivalTimesBeforeCurfew() {
        // foreach ($this -> flights as $flight) {
            // $this -> assertLessThanOrEqual(2200, $flight->arrivalTime);
        // }
    // }
}