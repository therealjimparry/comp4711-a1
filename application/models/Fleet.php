<?php

    /*
        Model for fleet.
        Gets all plane data from Plane and creates fleet using name
    */
    class Fleet extends CI_Model {
        var $data;

        // Constructor, gets all planes and adds to data array planes that are in the fleet
        function __construct () {
            parent::__construct();

            $temp = json_decode ($this -> plane -> all (), true);
            
            $index = -1;
            
            // Iterate through each record in associate array and check if type matches plane in fleet
            foreach ($temp as $key => $record) {
                $check = false;
                if (!empty ($record["id"])) {
                    $check = true;
                    switch ($record["id"]) {
                        case "avanti"  :
                            break;
                        case "caravan" :
                            break;
                        default :
                            $check = false;
                    }
                    if ($check)
                        $this -> data[++$index] = $record["id"];
                }
            }
            

        }

        // Returns all the planes in the fleet
        function all () {
            return $this -> data();
        }

        // Returns a plane which is in the fleet
        function get ($which) {
            return !isset ($this->data[$which]) ? null: $this -> data[$which];
        }

    }
?>