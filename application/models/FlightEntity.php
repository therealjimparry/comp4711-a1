<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for flight
     */
    class FlightEntity extends Entity {

        protected $uniqueId;
        protected $departureAirport;
        protected $destinationAirport;
        protected $departureTime;
        protected $arrivalTime;
        protected $aircraftCode;

        function __construct ($uniqueId = null, $destinationAirport = null, $departureAirport = null, $departureTime = null, $arrivalTime = null, $aircraftCode = null) {
            parent::__construct();
            $this -> uniqueId = $uniqueId;
            $this -> destinationAirport = $destinationAirport;
            $this -> departureAirport = $departureAirport;
            $this -> departureTime = $departureTime;
            $this -> arrivalTime = $arrivalTime;
            $this -> aircraftCode = $aircraftCode;
        }

        public function setUniqueId ($value) {
            $this -> uniqueId = $value;
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
            return new FlightEntity ($object.uniqueId, $destAirport, $departAirport, $object.departureTime, $object.arrivalTime, $object.aircraftCode);
        }

        public static function create_flight_from_arr_with_airport ($arr, $destAirport, $departAirport) {
            return new FlightEntity ($arr["uniqueId"], $destAirport, $departAirport, $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }

        public static function create_flight_from_obj ($object) {
            return new FlightEntity ($object.uniqueId, $object.destinationAirport, $object.departureAirport, $object.departureTime, $object.arrivalTime, $object.aircraftCode);
        }

        public static function create_flight_from_arr ($arr) {
            return new FlightEntity ($arr["uniqueId"], $arr["destinationAirport"], $arr["departureAirport"], $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }
       
    }

?>