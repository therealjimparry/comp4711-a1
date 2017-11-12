<?php

    /*
        Model for plane
     */
    class PlaneEntity extends Entity implements Model_Entity_Controller_Helper {

        protected $uniqueId;
        protected $plane;

        function __construct ($uniqueId = null, $plane = null) {
            parent::__construct();
            $this -> setUniqueId ($uniqueId);
            $this -> setPlane ($plane);
        }

        public function setUniqueId($value) {
            if (is_string($value) && preg_match("/^a(\d)+/", $value) === 1) {
                $this -> uniqueId = $value;
            }
        }

        public function setPlane ($value) {
            $this -> plane = $value;
        }
        
        public function getUniqueId() {
            return $this -> uniqueId;
        }

        public function getPlane () {
            return $this -> plane;
        }

        public function getViewArray () {
            return array_merge (array ("key" => $this -> uniqueId), $this -> plane -> getViewArray ());
        }

        public static function create_plane_from_obj ($object) {
            return new PlaneEntity ($object -> uniqueId, PlanesEntity::create_plane_from_obj($object -> id, $object -> manufacturer, $object -> model, $object -> price, $object -> seats, $object -> reach, $object -> cruise, $object -> takeoff, $object -> hourly));
        }

        public static function create_plane_from_obj_and_id ($uniqueId, $object) {
            return new PlaneEntity ($uniqueId, PlanesEntity::create_plane_from_obj($object -> id, $object -> manufacturer, $object -> model, $object -> price, $object -> seats, $object -> reach, $object -> cruise, $object -> takeoff, $object -> hourly));
        }

        public static function create_plane_from_plane_obj_and_id ($uniqueId, $object) {
            return new PlaneEntity ($uniqueId, $object);
        }

        public static function create_plane_from_arr ($arr) {
            return new PlaneEntity ($arr["uniqueId"], PlanesEntity::create_plane_from_arr($arr["id"], $arr["manufacturer"], $arr["model"], $arr["price"], $arr["seats"], $arr["reach"], $arr["cruise"], $arr["takeoff"], $arr["hourly"]));
        }

        public static function create_plane_from_arr_and_id ($uniqueId, $arr) {
            return new PlaneEntity ($uniqueId, PlanesEntity::create_plane_from_arr($arr["id"], $arr["manufacturer"], $arr["model"], $arr["price"], $arr["seats"], $arr["reach"], $arr["cruise"], $arr["takeoff"], $arr["hourly"]));
        }

    }

?>