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
        // do validation here
        
        
        $this->data['from'] = WackyAPI::getAirport($from)['community'];
        $this->data['to'] = WackyAPI::getAirport($to)['community'];
        
        $booking = array();
        foreach ($this->getFlightsByDepartureLocation($from) as $f) {
            array_push($booking, [$f]);
        }
        $booking = $this-> addBookings($booking, $to);
        $booking = $this-> addBookings($booking, $to);
        $booking = $this-> filterBookings($booking, $to);
        $this -> data['bookings'] = array();
        foreach ($booking as $book) {
            $asdf = [];
            foreach ($book as $flight) {
                $f = ['departureCommunity' => $flight -> departureAirport -> community, 'destinationCommunity' => $flight -> destinationAirport -> community];
                array_push($asdf, $f);
            }
            array_push($this -> data['bookings'], array('flights' => $asdf));
        }
        $this->render();
    }
    private function filterBookings($booking, $destId) {
        $result = array();
        foreach ($booking as $book) {
            if ($book[count($book) - 1] -> destinationAirport -> id === $destId) { // already at destination
                array_push($result, $book);
            }
        }
        return $result;
    }
    private function addBookings($booking, $destId) {
        $result = array();
        foreach ($booking as $book) {
            if ($book[count($book) - 1] -> destinationAirport -> id === $destId) { // already at destination
                array_push($result, $book);
                continue;
            }
            foreach ($this -> getFlightsByDepartureLocation($book[count($book) - 1] -> destinationAirport -> id) as $f) {
                $t = $book;
                array_push($t, $f);
                array_push($result, $t);
            }
        }
        return $result;
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