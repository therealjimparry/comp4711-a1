<?php

    /*
        Model for fleet entity, contains information about an entity in a fleet
     */
    class FleetEntity extends Entity {

        protected $planeId;
        protected $type;

        function __construct ($planeId = null, $type = null) {
            parent::__construct();
            $this -> setPlaneId ($planeId);
            $this -> setType ($type);
        }

        public function setPlaneId ($value) {
            $this -> planeId = $value;
        }

        public function setType ($value) {
            $this -> type = $value;
        }

        public function getPlaneId () {
            return $this -> planeId;
        }

        public function getType () {
            return $this -> type;
        }

        public static function create_fleet_entity_from_obj ($object) {
            return new FleetEntity ($object -> planeId, $object -> type);
        }

        public static function create_fleet_entity_from_arr ($arr) {
            return new FleetEntity ($arr["planeId"], $arr["type"]);
        }

    }

?>