<?php

    require_once APPPATH . 'core/JSON_Helper.php';

    class WackyAPI {

        private static $airplanes = 'http://wacky.jlparry.com/info/airplanes';
        private static $airlines  = 'https://wacky.jlparry.com/info/airlines';
        private static $airports  = 'https://wacky.jlparry.com/info/airports';

        public static function getAirplanes () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airplanes);
        }

        public static function getAirlines () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airlines);
        }

        public static function getAirports () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airports);
        }



    }

?>