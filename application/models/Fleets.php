<?php
    /*
        Model for fleet.
        Gets all plane data from Plane and creates fleet using name
    */
    class Fleets extends CI_Model {
        var $data;

        // Constructor, gets all planes and adds to data array planes that are in the fleet
        function __construct () {
            parent::__construct();

            $temp = json_decode ($this -> planes -> all (), true);
            
            $ap = -1;
            
            // Iterate through each record in associate array and check if type matches plane in fleet
            // assigns a plane to the fleet if it's name matches the selected planes
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
                    if ($check) {
                        ++$ap;
                        $this -> data["a$ap"] = $record;
                    }
                }
            }
        }

        // return number of planes in the fleet
        function count_planes () {
            return count ($this -> data);
        }

        // Returns all the planes in the fleet
        function all () {
            return $this -> data;
        }

        // Returns a plane which is in the fleet
        function get ($which) {
            return !isset ($this->data[$which]) ? null: $this -> data[$which];
        }

    }
?>