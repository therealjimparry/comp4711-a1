<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class FlightModelTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $flights;
    private $airlines;
    private $albatros;
    
    public function __construct() {
        parent::__construct();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://wacky.jlparry.com/info/airlines");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $this -> airlines = json_decode(curl_exec($curl), true);
        foreach ($this -> airlines as $air) {
            if ($air['id'] === 'albatros') {
                $this -> albatros = $air;
            }
        }
        curl_close($curl);
    }
    
    public function setUp() {
        // Load CI instance normally
        $this -> CI = &get_instance();
        $this -> flights = $this -> CI -> data['all_flights'];
    }
    
    public function testTrivial() {
        $this->assertEquals('bar', 'bar');
    }
    
    // public function testDepartureLocationsValid() {
        
    // }
}