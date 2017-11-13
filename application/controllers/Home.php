<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Home controller, uses data from many models (flights, and fleets)
*/
class Home extends Application {

    private static $SESS_PATH =  APPPATH . 'tmp/';

    public function __construct () {
        parent::__construct ();
        var_dump (Home::$SESS_PATH);
        ini_set('session.save_path', Home::$SESS_PATH);
        $this->load->library ('session');
        var_dump ($this -> session);
        $arr = array ('123');
        $this->session -> item = $arr;
        var_dump($this -> session -> item);
        session_destroy();
    }

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
		$this->data['fleets']  = $this -> fleets  -> all();
		$this->render();
	}

}

?>