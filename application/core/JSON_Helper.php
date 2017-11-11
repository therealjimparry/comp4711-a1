<?php

    class JSON_Helper {

        public static function get_json ($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }

        public static function get_json_as_assoc ($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        }

        public static function get_json_with_options ($url, $ssl, $rtransfer) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, $rtransfer);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }

        public static function get_json_as_assoc_with_options ($url, $ssl, $rtransfer) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, $rtransfer);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        }

    }

?>