<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Flight controller passes data from Fleets model to views
*/
class Flight extends Application
{

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->data['pagebody'] = 'welcome_message';
		$this->data['fleets']   = $this-> flights ->all();
		$this->render(); 
	}

}