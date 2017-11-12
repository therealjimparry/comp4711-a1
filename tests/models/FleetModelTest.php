<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FleetModelTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $fleets;
    private $validAirplanes;
      
    public function setUp() {
        // Load CI instance normally
        $this -> CI = &get_instance();
        $this -> fleets = $this -> CI -> data['fleets'];
        $this -> validAirplanes = WackyAPI::getAirplanes();
    }
    
    public function testPlaneTypesValid() {
        $this->assertEquals(1,1);
        $valid = array();
        foreach ($this -> validAirplanes as $air) {
            array_push($valid, $air['id']);
        }
        foreach ($this -> fleets as $fleet) {
            $this->assertContains($fleet->type, $valid);
        }
    }
    public function testFleetBelowCostLimit() {
        $sum = 0;
        foreach ($this -> fleets as $fleet) {
            $sum += $fleet->plane->plane->price;
        }
        $this -> assertLessThanOrEqual(10000, $sum);
    }
}