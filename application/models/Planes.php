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
            $this -> getPlanesForDropdown ();
        }

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_planes_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, PlanesEntity::create_plane_from_arr ($record));
            $this -> data = $records;
        }

        // Returns all planes from server
        public function all() {
            return $this -> data;
        }

        // Returns a specific airplane
        public function get($which) {
            foreach ($this -> data as $key => $record)
                if ($record -> id == $which)
                    return $record;
            return null;
        }

        public function getPlanesForDropdown () {
            $arr = array();
            foreach ($this -> data as $key => $record)
                $arr[$record -> getId()] = $record -> getId ();
            // array_push ($records, PlanesEntity::create_plane_from_arr ($record));
            /*return array (
                $this -> base -> getId () => $this -> base -> getCommunity (),
                $this -> dest1 -> getId () => $this -> dest1 -> getCommunity (),
                $this -> dest2 -> getId () => $this -> dest2 -> getCommunity (),
                $this -> dest3 -> getId () => $this -> dest3 -> getCommunity ()); */
            return $arr;
        }

        // Returns a specific airplane
        public function get_with_view($which) {
            foreach ($this -> data as $key => $record)
                if ($record -> id == $which)
                    return $record -> getViewArray();
            return null;
        }

    }
?>