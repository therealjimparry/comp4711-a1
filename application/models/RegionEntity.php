<?php

    /*
        Model for region
     */
    class RegionEntity extends Entity implements Model_Entity_Controller_Helper {

        protected $id;
        protected $name;
        protected $anchor;

        function __construct ($id = null, $name = null, $anchor = null) {
            parent::__construct();
            $this -> setId ($id);
            $this -> setName ($name);
            $this -> setAnchor ($anchor);
        }
        
        public function setId ($value) {
            $this -> id = $value;
        }

        public function setName ($value) {
            $this -> name = $value;
        }

        public function setAnchor ($value) {
            $this -> anchor = $value;
        }
        
        public function getId () {
            return $this -> id;
        }

        public function getName () {
            return $this -> name;
        }

        public function getAnchor () {
            return $this -> anchor;
        }

        public function getViewArray () {
            // return (array) $this;
            return array ("id" => $this -> id, "name" => $this -> name, "anchor" => $this -> anchor);
        }

        public static function create_region_from_obj ($object) {
            return new RegionEntity ($object -> id, $object -> name, $object -> anchor);
        }

        public static function create_region_from_arr ($arr) {
            return new RegionEntity ($arr["id"], $arr["name"], $arr["anchor"]);
        }

    }

?>