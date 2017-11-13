<?php

    /*
        Model for fleet entity, contains information about an entity in a fleet
     */
    class FleetEntity extends Entity implements Model_Entity_Controller_Helper{

        protected $planeId;
        protected $type;
        protected $plane;

        function __construct ($planeId = null, $type = null, $plane = null) {
            parent::__construct();
            $this -> setPlaneId ($planeId);
            $this -> setType ($type);
            $this -> setPlane ($plane);
            // $this -> setPlaneFromIdAndType ($planeId, $type);
        }

        public function setPlaneId ($value) {
            $this -> planeId = $value;
        }

        public function setType ($value) {
            $this -> type = $value;
        }

        public function setPlane ($value) {
            $this -> plane = $value;
        }

        public function setPlaneFromIdAndType ($id, $type) {
            if (!isset ($id) || !isset ($type))
                return;
           $plane = PlanesEntity::create_plane_from_arr (WackyAPI::getAirplane($type));
           $this -> plane = PlaneEntity::create_plane_from_plane_obj_and_id($id, $plane);
        }

        public function getPlaneId () {
            return $this -> planeId;
        }

        public function getType () {
            return $this -> type;
        }

        public function getPlane () {
            return $this -> plane;
        }

        public function getViewArray () {
            return array ("key" => $this -> planeId, "id" => $this -> type);
        }

        public static function create_fleet_entity_from_obj ($object) {
            return new FleetEntity ($object -> planeId, $object -> type, $object -> plane);
        }

        public static function create_fleet_entity_from_arr ($arr) {
            return new FleetEntity ($arr["planeId"], $arr["type"], $arr["plane"]);
        }

        public static function create_fleet_entity_and_plane_from_obj ($object) {
            return new FleetEntity ($object -> planeId, $object -> id, PlanesEntity::create_plane_from_obj($object));
        }

        public static function create_fleet_entity_and_plane_from_arr ($arr) {
            return new FleetEntity ($arr["planeId"], $arr["id"], PlanesEntity::create_plane_from_obj($arr));
        }
    }

?>