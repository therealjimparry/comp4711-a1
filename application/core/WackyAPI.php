<?php

    class WackyAPI {

        private static $airplanes = 'http://wacky.jlparry.com/info/airplanes/';
        private static $airlines  = 'https://wacky.jlparry.com/info/airlines/';
        private static $airports  = 'https://wacky.jlparry.com/info/airports/';
        private static $regions   = 'https://wacky.jlparry.com/info/regions/';

        private static $airline   = 'albatros';

        public static function getAirplanes () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airplanes);
        }

        public static function getAirplane ($value) {
            $airplane_url = WackyAPI::$airplanes . $value;
            return JSON_Helper::get_json_as_assoc ($airplane_url);
        }

        public static function getAirlines () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airlines);
        }

        public static function getAirline ($value) {
            $airline_url = WackyAPI::$airlines . $value;
            return JSON_Helper::get_json_as_assoc ($airline_url);
        }

        public static function getAirports () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airports);
        }

        public static function getAirport ($value) {
            $airport_url = WackyAPI::$airports . $value;
            return JSON_Helper::get_json_as_assoc ($airport_url);
        }

        public static function getRegions () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$regions);
        }

        public static function getRegion ($value) {
            $region_url = WackyAPI::$regions . $value;
            return JSON_Helper::get_json_as_assoc (WackyAPI::$regions);
        }

        public static function getAlbatros() {
            return $this -> getAirline (WackyAPI::$airline);
        }

    }

?>