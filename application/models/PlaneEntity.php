<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for plane
     */
    class PlaneEntity extends Entity {

        protected $uniqueId;
        protected $id;
        protected $manufacturer;
        protected $model;
        protected $price;
        protected $seats;
        protected $reach;
        protected $cruise;
        protected $takeoff;
        protected $hourly;

        function __construct ($id = "", $manufacturer = "", $model = "", $price = "", $seats = "", $reach = "", $cruise = "", $takeoff = "", $hourly = "") {
            parent::__construct();
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

        public function setUniqueId($value) {
            if (is_string($value) && preg_match("/^a(\d)+/", $value) === 1) {
                $this -> uniqueId = $value;
            }
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

        public function getUniqueId() {
            return $this -> uniqueId;
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

        public static function create_plane_from_obj ($object) {
            return new PlaneEntity ($object.id, $object.manufacturer, $object.model, $object.price, $object.seats, $object.reach, $object.cruise, $object.takeoff, $object.hourly);
        }

        public static function create_plane_from_arr ($arr) {
            return new PlaneEntity ($arr["id"], $arr["manufacturer"], $arr["model"], $arr["price"], $arr["seats"], $arr["reach"], $arr["cruise"], $arr["takeoff"], $arr["hourly"]);
        }

    }

?>