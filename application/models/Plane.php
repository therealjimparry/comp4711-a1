<?php

    /*
        Model for plane.
        Gets all plane data from json from server
    */
    class Plane extends CI_Model {

        // This hereby is a constructor
        public function __construct () {
            parent::__construct ();
        }

        // Returns all planes from json format from server
        public function all () {
            $page = "http://wacky.jlparry.com/info/airplanes";
            $json_planes = file_get_contents ($page);
            
            return $json_planes;
        }

    }
?>