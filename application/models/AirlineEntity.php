<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for plane
     */
    class AirlineEntity extends Entity {

        protected $id;
        protected $base;
        protected $dest1;
        protected $dest2;
        protected $dest3;

        function __construct ($id = "", $base = "", $dest1 = "", $dest2 = "", $dest3 = "") {
            parent::__construct();
            $this -> id = $id;
            $this -> base = $base;
            $this -> dest1 = $dest1;
            $this -> dest2 = $dest2;
            $this -> dest3 = $dest3;
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
            return $this -> seats;
        }

        public static function create_airline_from_obj ($object) {
            return new AirlineEntity ($object.id, $object.base, $object.dest1, $object.dest2, $object.dest3);
        }

        public static function create_airline_from_arr ($arr) {
            return new AirlineEntity ($arr["id"], $arr["base"], $arr["dest1"], $arr["dest2"], $arr["dest3"]);
        }

    }

?>