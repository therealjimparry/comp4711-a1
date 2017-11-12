<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Application {
    public function index() {
		$this->data['pagebody'] = 'booking';
        $albatros = WackyAPI::getAlbatros();
        $this->data['places'] = array();
        array_push($this->data['places'], WackyAPI::getAirport($albatros['base']));
        array_push($this->data['places'], WackyAPI::getAirport($albatros['dest1']));
        array_push($this->data['places'], WackyAPI::getAirport($albatros['dest2']));
        array_push($this->data['places'], WackyAPI::getAirport($albatros['dest3']));
        $this -> render();
    }
    public function search() {
		$this->data['pagebody'] = 'search';
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        
        $t = $this->getFlightsByDepartureLocation($from);
        print_r($t);
        $this->render();
    }
    private function getFlightsByDepartureLocation($airportId) {
        $flights = array();
        foreach ($this -> flights  -> all() as $f) {
            if ($f -> departureAirport -> id === $airportId) {
                array_push($flights, $f);
            }
        }
        return $flights;
    }
}

?>