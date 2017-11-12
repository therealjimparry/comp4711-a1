<?php

    /*
        Model for airport
     */
    class AirportEntity extends Entity {

        protected $id;
        protected $community;
        protected $airport;
        protected $region;
        protected $coordinates;
        protected $runway;
        protected $airline;

        function __construct ($id = null, $community = null, $airport = null, $region = null, $coordinates = null, $runway = null, $airline = null) {
            parent::__construct();
            $this -> id = $id;
            $this -> community = $community;
            $this -> airport = $airport;
            $this -> region = $region;
            $this -> coordinates = $coordinates;
            $this -> runway = $runway;
            $this -> airline = $airline;
        }

        public function setId ($value) {
            $this -> id = $value;
        }

        public function setCommunity ($value) {
            $this -> community = $value;
        }

        public function setAirport ($value) {
            $this -> airport = $value;
        }

        public function setRegion ($value) {
            $this -> region = $value;
        }

        public function setCoordinates ($value) {
            $this -> coordinates = $value;
        }

        public function setRunway ($value) {
            $this -> runway = $value;
        }

        public function setAirline ($value) {
            $this -> airline = $value;
        }

        public function getCommunity () {
            return $this -> community;
        }

        public function getAirport () {
            return $this -> airport;
        }

        public function getRegion () {
            return $this -> region;
        }

        public function getCoordinates () {
            return $this -> coordinates;
        }

        public function getRunway () {
            return $this -> runway = $value;
        }

        public function getAirline () {
            return $this -> airline;
        }

        public static function create_airport_from_obj ($object) {
            return new AirportEntity ($arr -> id, $arr -> community, $arr -> airport, $arr -> region, $arr -> coordinates, $arr -> runway, $arr -> airline);
        }

        public static function create_airport_from_arr ($arr) {
            return new AirportEntity ($arr["id"], $arr["community"], $arr["airport"], $arr["region"], $arr["coordinates"], $arr["runway"], $arr["airline"]);
        }

    }

?>