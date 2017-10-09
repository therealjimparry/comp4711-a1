<?php
    /*
        Model for plane.
        Gets all plane data from json from server
    */
    class Planes extends CI_Model {

        var $data;

        // This hereby is a constructor
        public function __construct () {
            parent::__construct ();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'http://wacky.jlparry.com/info/airplanes');
            $result = curl_exec($ch);
            curl_close($ch);
            $this -> data = json_decode($result, true);
        }

        // Returns all planes from server
        public function all() 
        {
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