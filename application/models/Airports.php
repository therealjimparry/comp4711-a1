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
            
            $this -> data = WackyAPI::getAirports();
            $this -> convert_to_airport_array();
        }

        // Returns all airlines
        public function all() 
        {
            return $this -> data;
        }
        
        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_airport_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, AirportEntity::create_airport_from_arr ($record));
            $this -> data = $records;
        }

        // Returns a specific airport
        public function get_airport($which) {
            foreach ($this -> data as $value)
                if ($value["id"] == $which)
                    return $value;
            return null;
        }

    }
?>