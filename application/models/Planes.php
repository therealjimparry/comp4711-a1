<?php

    /*
        Model for plane.
        Gets all plane data from json from server
    */
    class Planes extends CI_Model {

        // This hereby is a constructor
        public function __construct () {
            parent::__construct ();
        }

        // Returns all planes from json format from server
        public function all () {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'http://wacky.jlparry.com/info/airplanes');
            $result = curl_exec($ch);
            curl_close($ch);

            // $page = "http://wacky.jlparry.com/info/airplanes";
            // $json_planes = file_get_contents ($page);
            
            // return $json_planes;

            return $result;
        }

    }
?>