<?php

    /*
        Model for plane
     */
    class PlanesEntity extends Entity implements Model_Entity_Controller_Helper {

        protected $id;
        protected $manufacturer;
        protected $model;
        protected $price;
        protected $seats;
        protected $reach;
        protected $cruise;
        protected $takeoff;
        protected $hourly;

        function __construct ($id = null, $manufacturer = null, $model = null, $price = null, $seats = null, $reach = null, $cruise = null, $takeoff = null, $hourly = null) {
            parent::__construct();
            $this -> setId ($id);
            $this -> setManufacturer ($manufacturer);
            $this -> setModel ($model);
            $this -> setPrice ($price);
            $this -> setSeats ($seats);
            $this -> setReach ($reach);
            $this -> setCruise ($cruise);
            $this -> setTakeoff ($takeoff);
            $this -> setHourly ($hourly);
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

        public function getModel () {
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

        public function getViewArray () {
            // return (array) $this;
            return array ("id" => $this -> id, "manufacturer" => $this -> manufacturer, "model" => $this -> model, "price" => $this -> price,
            	"seats" => $this -> seats, "reach" => $this -> reach, "cruise" => $this -> cruise, "takeoff" =>	$this -> takeoff, "hourly" => $this -> hourly);
        }

        public static function create_plane_from_obj ($object) {
            return new PlanesEntity ($object -> id, $object -> manufacturer, $object -> model, $object -> price, $object -> seats, $object -> reach, $object -> cruise, $object -> takeoff, $object -> hourly);
        }

        public static function create_plane_from_arr ($arr) {
            return new PlanesEntity ($arr["id"], $arr["manufacturer"], $arr["model"], $arr["price"], $arr["seats"], $arr["reach"], $arr["cruise"], $arr["takeoff"], $arr["hourly"]);
        }

    }

?>