<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Home controller, uses data from many models (flights, and fleets)
*/
class Home extends Application
{

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->data['pagebody']   = 'welcome_message';
		$airline = $this -> flights -> get_flight_airline () -> getViewArray ();
		
        $this -> data['airports'] = array (
			"airport" => $airline
		);

        $this->data['no_flights']   = $this -> flights  -> count_flights();
		$this->data['no_planes']    = $this -> fleets   -> count_planes(); 
		$this->data['all_flights']  = $this -> flights  -> all();
		$this->render();
	}

}