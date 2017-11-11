<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for flight
     */
    class FlightEntity extends Entity {

        protected $uniqueid;
        protected $departureAirport;
        protected $destinationAirport;
        protected $departureTime;
        protected $arrivalTime;
        protected $aircraftCode;

        function __construct ($uniqueid = null, $destinationAirport = null, $departureAirport = null, $departureTime = null, $arrivalTime = null, $aircraftCode = null) {
            parent::__construct();
            $this -> uniqueid = $uniqueid;
            $this -> destinationAirport = $destinationAirport;
            $this -> departureAirport = $departureAirport;
            $this -> departureTime = $departureTime;
            $this -> arrivalTime = $arrivalTime;
            $this -> aircraftCode = $aircraftCode;
        }

        public function setUniqueid ($value) {
            $this -> uniqueid = $value;
        }

        public function setDepartureAirport ($value) {
            $this -> departureAirport = $value;
        }

        public function setDestinationAirport($value) {
            $this -> destinationAirport = $value;
        }

        public function setDepartureTime ($value) {
            $this -> departureTime = $value;
        }

        public function setArrivalTime ($value) {
            $this -> arrivalTime = $value;
        }

        public function setAircraftCode ($value) {
            $this -> aircraftCode = $value;
        }

        public function getUniqueid () {
            return $this -> uniqueid;
        }

        public function getDepartureAirport() {
            return $this -> departureAirport;
        }

        public function getDestinationLocation () {
            return $this -> destinationAirport;
        }

        public function getDepartureTime () {
            return $this -> departureTime;
        }

        public function getArrivalTime () {
            return $this -> arrivalTime;
        }

        public function getAircraftCode () {
            return $this -> aircraftCode;
        }

        public static function create_flight_from_obj_with_airport ($object, $destAirport, $departAirport) {
            return new FlightEntity ($object.id, $destAirport, $departAirport, $object.departureTime, $object.arrivalTime, $object.aircraftCode);
        }

        public static function create_flight_from_arr_with_airport ($arr, $destAirport, $departAirport) {
            return new FlightEntity ($arr["uniqueid"], $destAirport, $departAirport, $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }

        public static function create_flight_from_obj ($object) {
            return new FlightEntity ($object.id, $object.destinationAirport, $object.departureAirport, $object.departureTime, $object.arrivalTime, $object.aircraftCode);
        }

        public static function create_flight_from_arr ($arr) {
            return new FlightEntity ($arr["uniqueid"], $arr["destinationAirport"], $arr["departureAirport"], $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }
       
    }

?>