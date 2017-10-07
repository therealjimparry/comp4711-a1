<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Fleet controller passes data from Fleets model to views
*/
class Fleet extends Application
{

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		// To be changed from welcome_message to the view name related to fleet
		$this->data['pagebody'] = 'welcome_message';
		$this->data['fleets']   = $this-> fleets -> all();
		$this->render(); 
	}

}