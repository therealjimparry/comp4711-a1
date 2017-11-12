<?php

    /*
        Model for regions.
        Gets all regions json data from server
    */
    class Regions extends CI_Model {
        var $data;

        // Default constructor; creates model
        public function __construct () 
        {
            parent::__construct ();
            
            $this -> data = WackyAPI::getRegions();
            $this -> convert_to_regions_array();
        }

        // Returns all regions
        public function all() 
        {
            return $this -> data;
        }
        
        // Convert data recieved in array format from server to an array containing region objects
        private function convert_to_regions_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, RegionEntity::create_region_from_arr ($record));
            $this -> data = $records;
        }

        // Returns a specific region
        public function get($which) {
            foreach ($this -> data as $value)
                if ($value -> id == $which)
                    return $value;
            return null;
        }

    }
?>