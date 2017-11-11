<?php
    /*
        Model for airports.
        Gets all airports json data from server
    */
    class Airports extends CI_Model 
    {
        var $data;

        // Default constructor; creates model
        public function __construct () 
        {
            parent::__construct ();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'https://wacky.jlparry.com/info/airports');
            $result = curl_exec($ch);
            curl_close($ch);
            $this -> data = json_decode($result, true);
            $this -> convert_to_airport_array();
        }

        // Returns all airlines
        public function all() 
        {
            return $this -> data;
        }

        private function create_airport_from_obj ($object) {
            return $this -> create_airport ($arr.id, $arr.community, $arr.airport, $arr.region, $arr.coordinates, $arr.runway, $arr.airline);
        }

        private function create_airport_from_arr ($arr) {
            return $this -> create_airport ($arr["id"], $arr["community"], $arr["airport"], $arr["region"], $arr["coordinates"], $arr["runway"], $arr["airline"]);
        }

        private function create_airport ($id, $community, $airport, $region, $coordinates, $runway, $airline) {
            return new Airport ($id, $community, $airport, $region, $coordinates, $runway, $airline);
        }

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_airport_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, $this->create_airport_from_arr ($record));
            $this -> data = $records;
        }

        // Returns a specific airline
        public function get_airport($which) {
            foreach ($this -> data as $value)
            if ($value["id"] == $which)
                return $value;
            return null;
        }

    }
?>