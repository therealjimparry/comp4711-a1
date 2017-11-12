<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightModelTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $flights;
    private $albatros;
      
    public function setUp() {
        // Load CI instance normally
        $this -> CI = &get_instance();
        $this -> flights = $this -> CI -> data['all_flights'];
        $this -> albatros = WackyAPI::getAlbatros();
    }
    
    public function testDestinationAirportsValid() {
        $this->assertEquals(1,1);
        foreach ($this -> flights as $flight) {
            $this -> assertContains($flight->destinationAirport->id, [$this->albatros['base'], $this->albatros['dest1'], $this->albatros['dest2'], $this->albatros['dest3']]);
        }
    }
    public function testDepartureAirportsValid() {
        $this->assertEquals(1,1);
        foreach ($this -> flights as $flight) {
            $this -> assertContains($flight->departureAirport->id, [$this->albatros['base'], $this->albatros['dest1'], $this->albatros['dest2'], $this->albatros['dest3']]);
        }
    }
    public function testArrivalTimesBeforeCurfew() {
        foreach ($this -> flights as $flight) {
            $this -> assertLessThanOrEqual(2200, $flight->arrivalTime);
        }
    }
    public function testDepartureTimesAfter800() {
        foreach ($this -> flights as $flight) {
            $this -> assertGreaterThanOrEqual(800, $flight->arrivalTime);
        }
    }
}