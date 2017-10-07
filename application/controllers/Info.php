<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
    Info controller passes data from Fleets and Flights model to views
    Used to show user all data in fleet and flight model in JSON
    Service controller containing sub controllers as methods
    REST type controller
    Useful for other applications to use our data
*/
class Info extends Application
{
    /**
     * fleet sub controller method to retreive and display all data in fleet as JSON
     */
    public function fleet () {
        $this->data['fleets'] = $this->fleets->all();
        header("Content-type: application/json");
        echo json_encode($this->data['fleets']);
    }

    /**
     * flight sub controller method to retreive and display all data in flight as JSON
     */
    public function flight () {
        $this->data['flights'] = $this->flights->all();
        header("Content-type: application/json");
        echo json_encode($this->data['flights']);
    }

}