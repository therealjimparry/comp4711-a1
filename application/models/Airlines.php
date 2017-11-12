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
            $this -> data = WackyAPI::getAirlines ();
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

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_airline_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, AirlineEntity::create_airline_from_arr ($record));
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