<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for plane
     */
    class Plane extends Entity {

        protected $id;
        protected $manufacturer;
        protected $model;
        protected $price;
        protected $seats;
        protected $reach;
        protected $cruise;
        protected $takeoff;
        protected $hourly;

        function __construct ($id = "null", $manufacturer = "null", $model = "null", $price = "null", $seats = "null", $reach = "null", $cruise = "null", $takeoff = "null", $hourly = "null") {
            $this -> id = $id;
            $this -> manufacturer = $manufacturer;
            $this -> model = $model;
            $this -> price = $price;
            $this -> seats = $seats;
            $this -> reach = $reach;
            $this -> cruise = $cruise;
            $this -> takeoff = $takeoff;
            $this -> hourly = $hourly;
        }

        public function setId ($value) {
            $this -> id = $value;
        }

        public function setManufacturer ($value) {
            $this -> manufacturer = $value;
        }

        public function setModel ($value) {
            $this -> model = $value;
        }

        public function setPrice ($value) {
            $this -> price = $value;
        }

        public function setSeats ($value) {
            $this -> seats = $value;
        }

        public function setReach ($value) {
            $this -> reach = $value;
        }

        public function setCruise ($value) {
            $this -> cruise = $value;
        }

        public function setTakeoff ($value) {
            $this -> takeoff = $value;
        }

        public function setHourly ($value) {
            $this -> hourly = $value;
        }

        public function getId () {
            return $this -> id;
        }

        public function getManufacturer () {
            return $this -> manufacturer;
        }

        public function gettModel () {
            return $this -> model;
        }

        public function getPrice () {
            return $this -> price;
        }

        public function getSeats () {
            return $this -> seats;
        }

        public function getReach () {
            return $this -> reach;
        }

        public function getCruise () {
            return $this -> cruise;
        }

        public function getTakeoff () {
            return $this -> takeoff;
        }

        public function getHourly () {
            return $this -> hourly;
        }

    }

?>