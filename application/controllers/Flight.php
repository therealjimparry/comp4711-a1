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
		$this->data['pagebody'] = 'flightView';
		$this->data['flights']  = $this -> flights -> all();
		$this->render(); 
	}

}