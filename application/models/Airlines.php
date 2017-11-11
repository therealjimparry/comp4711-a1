<?php
    /*
        Model for airlines.
        Gets all airlines json data from server
    */
    class Airlines extends CI_Model 
    {
        var $data;

        // Default constructor; creates model
        public function __construct () 
        {
            parent::__construct ();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'https://wacky.jlparry.com/info/airlines');
            $result = curl_exec($ch);
            curl_close($ch);
            $this -> data = json_decode($result, true);
            foreach ($this -> data as $key => $record) {
                $record['key'] = "a{$key}";
                $this->data["a{$key}"] = $record;
            }
            $this -> convert_to_airline_array();
        }

        // Returns all airlines
        public function all() 
        {
            return $this -> data;
        }

        private function create_airline_from_obj ($object) {
            return $this -> create_airline ($object.id, $object.base, $object.dest1, $object.dest2, $object.dest3);
        }

        private function create_airline_from_arr ($arr) {
            return $this -> create_airline ($arr["id"], $arr["base"], $arr["dest1"], $arr["dest2"], $arr["dest3"]);
        }

        private function create_airline ($id, $base, $dest1, $dest2, $dest3) {
            return new Airline ($id, $base, $dest1, $dest2, $dest3);
        }

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_airline_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, $this->create_airline_from_arr ($record));
            $this -> data = $records;
        }

        // Returns a specific airline
        public function get_airline($which) {
            foreach ($this -> data as $value)
            if ($value -> id == $which)
                return $value;
            return null;
        }

    }
?>