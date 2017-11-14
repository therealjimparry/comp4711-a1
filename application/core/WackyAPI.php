<?php

    class WackyAPI {

        private static $airplanes = 'http://wacky.jlparry.com/info/airplanes/';
        private static $airlines  = 'https://wacky.jlparry.com/info/airlines/';
        private static $airports  = 'https://wacky.jlparry.com/info/airports/';
        private static $regions   = 'https://wacky.jlparry.com/info/regions/';

        private static $airline   = 'albatros';

        private static $airports_data;

        public static function setup () {
            WackyAPI::$airports_data = WackyAPI::getAirports();
        }

        public static function getAirplanes () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airplanes);
            // return json_decode('[ { "id": "avanti", "manufacturer": "Piaggo", "model": "Avanti II", "price": "7195", "seats": "8", "reach": "2797", "cruise": "589", "takeoff": "994", "hourly": "977" }, { "id": "baron", "manufacturer": "Beechcraft", "model": "Baron", "price": "1350", "seats": "4", "reach": "1948", "cruise": "373", "takeoff": "701", "hourly": "340" }, { "id": "caravan", "manufacturer": "Cessna", "model": "Grand Caravan EX", "price": "2300", "seats": "14", "reach": "1689", "cruise": "340", "takeoff": "660", "hourly": "389" }, { "id": "citation", "manufacturer": "Cessna", "model": "Citation M2", "price": "3200", "seats": "7", "reach": "1550", "cruise": "748", "takeoff": "978", "hourly": "1122" }, { "id": "kingair", "manufacturer": "Beechcraft", "model": "King Air C90", "price": "3900", "seats": "12", "reach": "2446", "cruise": "500", "takeoff": "1402", "hourly": "990" }, { "id": "mustang", "manufacturer": "Cessna", "model": "Citation Mustang", "price": "2770", "seats": "4", "reach": "2130", "cruise": "630", "takeoff": "950", "hourly": "1015" }, { "id": "pc12ng", "manufacturer": "Pilatus", "model": "PC-12 NG", "price": "3300", "seats": "9", "reach": "4147", "cruise": "500", "takeoff": "450", "hourly": "727" }, { "id": "phenom100", "manufacturer": "Embraer", "model": "Phenom 100", "price": "2980", "seats": "4", "reach": "2148", "cruise": "704", "takeoff": "1036", "hourly": "926" } ]', true);  
        }

        public static function getAirplane ($value) {
            $airplane_url = WackyAPI::$airplanes . $value;
            return JSON_Helper::get_json_as_assoc ($airplane_url);
        }

        public static function getAirlines () {
            return JSON_Helper::get_json_as_assoc (WackyAPI::$airlines);
            // return json_decode('[ { "id": "albatros", "base": "YBL", "dest1": "YAL", "dest2": "YZT", "dest3": "YMP" }, { "id": "bluebird", "base": "YCD", "dest1": "YQQ", "dest2": "YAZ", "dest3": "YPB" }, { "id": "cuckoo", "base": "YCG", "dest1": "ZGF", "dest2": "YCW", "dest3": "ZMH" }, { "id": "dove", "base": "YCW", "dest1": "YSE", "dest2": "YPB", "dest3": "YXT" }, { "id": "eagle", "base": "YDQ", "dest1": "YXJ", "dest2": "YNH", "dest3": "YCQ" }, { "id": "falcon", "base": "YDT", "dest1": "YCD", "dest2": "ZGF", "dest3": "YXC" }, { "id": "goose", "base": "YGE", "dest1": "ZMH", "dest2": "YYJ", "dest3": "YVE" }, { "id": "heron", "base": "YKA", "dest1": "YGE", "dest2": "YBD", "dest3": "YSE" }, { "id": "ibis", "base": "YLW", "dest1": "YCP", "dest2": "YAA", "dest3": "YCG" }, { "id": "junco", "base": "YPK", "dest1": "YCW", "dest2": "ZMH", "dest3": "YYF" }, { "id": "kite", "base": "YPR", "dest1": "ZMT", "dest2": "YZP", "dest3": "YXT" }, { "id": "loon", "base": "YPW", "dest1": "YBD", "dest2": "ZEL", "dest3": "YPU" }, { "id": "magpie", "base": "YQZ", "dest1": "YXS", "dest2": "YWL", "dest3": "YKA" }, { "id": "nuthatch", "base": "YRV", "dest1": "YCG", "dest2": "YMB", "dest3": "YCZ" }, { "id": "owl", "base": "YSN", "dest1": "YRV", "dest2": "YCZ", "dest3": "YVE" }, { "id": "pelican", "base": "YVR", "dest1": "YPR", "dest2": "YXS", "dest3": "YXC" }, { "id": "quail", "base": "YXC", "dest1": "YBD", "dest2": "YAZ", "dest3": "YCP" }, { "id": "raven", "base": "YXS", "dest1": "YPR", "dest2": "YDQ", "dest3": "YVR" }, { "id": "swallow", "base": "YXT", "dest1": "XQU", "dest2": "YYD", "dest3": "ZST" }, { "id": "thrush", "base": "YXX", "dest1": "YDT", "dest2": "YMB", "dest3": "YLW" }, { "id": "unlikely", "base": "YYD", "dest1": "YPZ", "dest2": "YDL", "dest3": "ZST" }, { "id": "vulture", "base": "YYE", "dest1": "YDL", "dest2": "YXJ", "dest3": "YXX" }, { "id": "warbler", "base": "YYF", "dest1": "YHE", "dest2": "YKA", "dest3": "YXC" }, { "id": "xwing", "base": "YYJ", "dest1": "YBL", "dest2": "YVR", "dest3": "YPW" }, { "id": "yellowhammer", "base": "YZY", "dest1": "YQZ", "dest2": "ZEL", "dest3": "YGB" }, { "id": "zipper", "base": "ZMH", "dest1": "YVR", "dest2": "YXS", "dest3": "YPR" } ]', true);            
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

        public static function getAirportFromData ($which) {
            if (empty (WackyAPI::$airports_data))
                WackyAPI::setup ();
            foreach (WackyAPI::$airports_data as $value)
                if ($value["id"] == $which)
                    return $value;
            return null;
        }

        public static function getRegions () {
           return JSON_Helper::get_json_as_assoc (WackyAPI::$regions);
           // return json_decode('[ { "id": "1", "name": "Vancouver Island", "anchor": "YCD" }, { "id": "2", "name": "Lower Mainland", "anchor": "YDT" }, { "id": "3", "name": "Thompson-Nicola", "anchor": "YKA" }, { "id": "4", "name": "Kootenay", "anchor": "YXC" }, { "id": "5", "name": "Cariboo", "anchor": "YWL" }, { "id": "6", "name": "Skeena", "anchor": "YYD" }, { "id": "7", "name": "Omineca", "anchor": "YXS" }, { "id": "8", "name": "Okanagan", "anchor": "YYF" }, { "id": "9", "name": "Peace", "anchor": "YXJ" } ]', true);
        }

        public static function getRegion ($value) {
            $region_url = WackyAPI::$regions . $value;
            return JSON_Helper::get_json_as_assoc (WackyAPI::$regions);
        }

        public static function getAlbatros() {
            return WackyApi::getAirline("albatros");
            // return '{ "id": "albatros", "base": "YBL", "dest1": "YAL", "dest2": "YZT", "dest3": "YMP" }';
        }

    }

?>