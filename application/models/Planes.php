<?php

    /*
        Model for planes.
        Gets all plane data from json from server
    */
    class Planes extends CI_Model {

        var $data;

        // This hereby is a constructor
        public function __construct () {
            parent::__construct ();
            $this -> data = WackyAPI::getAirplanes ();
            $this -> convert_to_planes_array ();
        }

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_planes_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, PlaneEntity::create_plane_from_arr ($record));
            $this -> data = $records;
        }

        // Returns all planes from server
        public function all() {
            return $this -> data;
        }

        // Returns a specific airplane
        public function get($which) {
            foreach ($this -> data as $key => $record)
                if ($record["id"] == $which)
                    return $record;
            return null;
        }

    }
?>