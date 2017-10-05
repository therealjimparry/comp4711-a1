<?php
    class Fleet extends CI_Model {
        var $data;

        function __construct () {
            parent::__construct();

            $temp = json_decode ($this -> plane -> all (), true);
            
            $index = -1;
            
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

        function all () {
            return $this -> data();
        }

        function get ($which) {
            return !isset ($this->data[$which]) ? null: $this -> data[$which];
        }

    }
?>