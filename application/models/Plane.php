<?php
    class Plane extends CI_Model {

        public function __construct () {
            parent::__construct ();
            // $page = "http://wacky.jlparry.com/info/airplanes";
            // $json_planes = file_get_contents ($page);
            // var_dump ($json_planes);
        }

        public function all () {
            $page = "http://wacky.jlparry.com/info/airplanes";
            $json_planes = file_get_contents ($page);
            
            return $json_planes;
        }

    }
?>