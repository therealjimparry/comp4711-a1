<?php

    /*
        Model for data from wacky sever.
    */
    class Wacky_Data_Model extends CI_Model {

        // Default constructor; creates model
        public function __construct () 
        {
            parent::__construct ();
            WackyAPI::getAll ();
        }

    }
?>