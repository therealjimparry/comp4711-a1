<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application
{

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		// To be changed from welcome_message to the view name related to fleet
		$this->data['pagebody'] = 'welcome_message';
		$this->data['planes']   = $this->plane->all();
		$this->render(); 
	}

}