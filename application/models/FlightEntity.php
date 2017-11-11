<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for flight
     */
    class FlightEntity extends Entity {

        protected $uniqueid;
        protected $departureLocation;
        protected $destinationLocation;
        protected $departureLocationC;
        protected $destinationLocationC;
        protected $departureTime;
        protected $arrivalTime;
        protected $aircraftCode;

        function __construct ($uniqueid = "", $departureLocation = "", $destinationLocation = "", $departureLocationC = "", $destinationLocationC = "", $departureTime = "", $arrivalTime = "", $aircraftCode = "") {
            parent::__construct();
            $this -> uniqueid = $uniqueid;
            $this -> departureLocation = $departureLocation;
            $this -> destinationLocation = $destinationLocation;
            $this -> departureLocationC = $departureLocationC;
            $this -> destinationLocationC = $destinationLocationC;
            $this -> departureTime = $departureTime;
            $this -> arrivalTime = $arrivalTime;
            $this -> aircraftCode = $aircraftCode;
        }

        public function setDepartureLocation($value) {
            $this -> departureLocation = $value;
        }

        public function setDestinationLocation ($value) {
            $this -> destinationLocation = $value;
        }

        public function setDepartureLocationC ($value) {
            $this -> departureLocationC = $value;
        }

        public function setDestinationLocationC ($value) {
            $this -> destinationLocationC = $value;
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

        public function getDepartureLocation() {
            return $this -> departureLocation;
        }

        public function getDestinationLocation () {
            return $this -> destinationLocation;
        }

        public function getDepartureLocationC () {
            return $this -> departureLocationC;
        }

        public function getDestinationLocationC () {
            return $this -> destinationLocationC;
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

        public static function create_flight_from_obj ($object) {
            return new FlightEntity ($object.id, $object.departureLocation, $object.destinationLocation, $object.departureLocationC, $object.destinationLocationC, $object.departureTime, $object.arrivalTime, $object.aircraftCode);
        }

        public static function create_flight_from_arr ($arr) {
            return new FlightEntity ($arr["uniqueid"], $arr["departureLocation"], $arr["destinationLocation"], $arr["departureLocationC"], $arr["destinationLocationC"], $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }
       
    }

?>