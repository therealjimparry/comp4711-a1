<?php

    /*
        Class for models to use so that controller have an easier time with objects.
        Functions to help controller with accessing model items.
     */
    class Model_Controller_Helper extends CSV_Model {

        function viewAll () {
            $arr = array ();
            foreach ($this -> _data as $key => $record) {
                array_push ($arr, $record -> getViewArray());
            }
            return $arr;
        }

    }

?>

