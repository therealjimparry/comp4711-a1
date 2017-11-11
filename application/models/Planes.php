<?php

    /*
        Model for planes.
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
            $this -> convert_to_planes_array ();
        }

        private function create_plane_from_obj ($object) {
            return $this -> create_plane ($object.id, $object.manufacturer, $object.model, $object.price, $object.seats, $object.reach, $object.cruise, $object.takeoff, $object.hourly);
        }

        private function create_plane_from_arr ($arr) {
            return $this -> create_plane ($arr["id"], $arr["manufacturer"], $arr["model"], $arr["price"], $arr["seats"], $arr["reach"], $arr["cruise"], $arr["takeoff"], $arr["hourly"]);
        }

        private function create_plane ($id, $manufacturer, $model, $price, $seats, $reach, $cruise, $takeoff, $hourly) {
            return new PlaneModel ($id, $manufacturer, $model, $price, $seats, $reach, $cruise, $takeoff, $hourly);
        }

        // Convert data recieved in array format from server to an array containing plane objects
        private function convert_to_planes_array () {
            $records = array();
            foreach ($this -> data as $key => $record)
                array_push ($records, $this->create_plane_from_arr ($record));
            $this -> data = $records;
        }

        // Returns all planes from server
        public function all() {
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