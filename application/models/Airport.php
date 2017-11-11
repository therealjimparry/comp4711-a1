<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for airport
     */
    class Airport extends Entity {

        protected $id;
        protected $community;
        protected $airport;
        protected $region;
        protected $coordinates;
        protected $runway;
        protected $airline;

        function __construct ($id = "", $community = "", $airport = "", $region = "", $coordinates = "", $runway = "", $airline = "") {
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

    }

?>