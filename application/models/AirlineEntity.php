<?php

    /*
        Model for plane
     */
    class AirlineEntity extends Entity {

        protected $id;
        protected $base;
        protected $dest1;
        protected $dest2;
        protected $dest3;

        function __construct ($id = null, $base = null, $dest1 = null, $dest2 = null, $dest3 = null) {
            parent::__construct();
            $this -> setId ($id);
            $this -> setBase ($base);
            $this -> setDest1 ($dest1);
            $this -> setDest2 ($dest2);
            $this -> setDest3 ($dest3);
        }

        public function setId ($value) {
            $this -> id = $value;
        }

        public function setBase($value) {
            $this -> base = $value;
        }

        public function setDest1 ($value) {
            $this -> dest1 = $value;
        }

        public function setDest2 ($value) {
            $this -> dest2 = $value;
        }

        public function setDest3 ($value) {
            $this -> dest3 = $value;
        }

        public function getId () {
            return $this -> id;
        }

        public function getBase () {
            return $this -> base;
        }

        public function getDest1 () {
            return $this -> dest1;
        }

        public function getDest2 () {
            return $this -> dest2;
        }

        public function getDest3 () {
            return $this -> dest3;
        }

        public function getAirports () {
            return array ($this -> base, $this -> dest1, $this -> dest2, $this -> dest3);
        }

        public static function create_airline_from_obj ($object) {
            return new AirlineEntity ($object -> id, $object -> base, $object -> dest1, $object -> dest2, $object -> dest3);
        }

        public static function create_airline_from_arr ($arr) {
            return new AirlineEntity ($arr["id"], $arr["base"], $arr["dest1"], $arr["dest2"], $arr["dest3"]);
        }

        public static function create_airline_from_obj_with_id ($object) {
            return new AirlineEntity ($object -> id, AirportEntity::create_airport_from_id($object -> base), AirportEntity::create_airport_from_id($object -> dest1), AirportEntity::create_airport_from_id($object -> dest2), AirportEntity::create_airport_from_id($object -> dest3));
        }

        public static function create_airline_from_arr_with_id ($arr) {
            return new AirlineEntity ($arr["id"], AirportEntity::create_airport_from_id($arr["base"]), AirportEntity::create_airport_from_id($arr["dest1"]), AirportEntity::create_airport_from_id($arr["dest2"]), AirportEntity::create_airport_from_id($arr["dest3"]));
        }

        public static function create_airline_from_arr_with_api_with_id ($value) {
            $arr = WackyAPI::getAirline ($value);
            return new AirlineEntity ($arr["id"], AirportEntity::create_airport_from_id($arr["base"]), AirportEntity::create_airport_from_id($arr["dest1"]), AirportEntity::create_airport_from_id($arr["dest2"]), AirportEntity::create_airport_from_id($arr["dest3"]));            
        }

    }

?>