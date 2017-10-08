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
		$this->data['pagebody'] = 'fleet';
		$this->data['fleets']   = $this-> fleets -> all();
		$this->render(); 
	}

	/**
	 * Show method for controller, shows specific information for a plane given its identifier
	 */
	public function show($id) {
		$this->data['pagebody'] = 'plane';
		$source = $this -> planes -> get ($id);
		$this->data['plane_info'] = array ("values" => $source);
		$this -> render();
	}

}