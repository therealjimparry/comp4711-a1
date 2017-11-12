<?php

    /*
        Model for flight
     */
    class FlightEntity extends Entity implements Model_Entity_Controller_Helper {

        protected $uniqueId;
        protected $departureAirport;
        protected $destinationAirport;
        protected $departureTime;
        protected $arrivalTime;
        protected $aircraftCode;

        function __construct ($uniqueId = null, $destinationAirport = null, $departureAirport = null, $departureTime = null, $arrivalTime = null, $aircraftCode = null) {
            parent::__construct();
            $this -> setUniqueId ($uniqueId);
            $this -> setDestinationAirport ($destinationAirport);
            $this -> setDepartureAirport ($departureAirport);
            $this -> setDepartureTime ($departureTime);
            $this -> setArrivalTime ($arrivalTime);
            $this -> setAircraftCode ($aircraftCode);
        }

        public function setUniqueId ($value) {
            $this -> uniqueId = $value;
        }

        public function setPlaneId ($value) {
            $this -> planeId = $value;
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

        public function getUniqueId () {
            return $this -> uniqueId;
        }

        public function getPlaneId () {
            return $this -> planeId;
        }

        public function getDepartureAirport() {
            return $this -> departureAirport;
        }

        public function getDestinationAirport () {
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

        public function getViewArray () {
            return array ("key" => $this -> uniqueId, "aircraftCode" => $this -> aircraftCode, "destinationAirport" => $this -> destinationAirport -> getCommunity (), 
            "departureAirport" => $this -> departureAirport -> getCommunity ());
        }

        public static function create_flight_from_obj_with_airport ($object, $destAirport, $departAirport) {
            return new FlightEntity ($object -> uniqueId, $destAirport, $departAirport, $object -> departureTime, $object -> arrivalTime, $object -> aircraftCode);
        }

        public static function create_flight_from_arr_with_airport ($arr, $destAirport, $departAirport) {
            return new FlightEntity ($arr["uniqueId"], $destAirport, $departAirport, $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }

        public static function create_flight_from_obj ($object) {
            return new FlightEntity ($object -> uniqueId, $object -> destinationAirport, $object -> departureAirport, $object -> departureTime, $object -> arrivalTime, $object -> aircraftCode);
        }

        public static function create_flight_from_arr ($arr) {
            return new FlightEntity ($arr["uniqueId"], $arr["destinationAirport"], $arr["departureAirport"], $arr["departureTime"], $arr["arrivalTime"], $arr["aircraftCode"]);
        }

        public static function create_flight_and_airport_from_arr ($arr) {
            return new FlightEntity ($arr["uniqueId"], AirportEntity::create_airport_from_id ($arr["departureLocation"]), AirportEntity::create_airport_from_id ($arr["destinationLocation"]), $arr["departureTime"], $arr["arrivalTime"], $arr["planeId"]);
        }

        public static function create_flight_and_airport_from_obj ($object) {
            return new FlightEntity ($object -> uniqueId, AirportEntity::create_airport_from_id ($object -> departureLocation),  AirportEntity::create_airport_from_id ($object -> destinationLocation), $object -> departureTime, $object -> arrivalTime, $object -> planeId);
        }
       
    }

?>