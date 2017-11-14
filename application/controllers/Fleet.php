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
		if($this -> session -> userdata('userrole') == "Owner") {
			$this->data['pagebody'] = 'fleet_owner';
		} else {
			$this->data['pagebody'] = 'fleet_guest';
		}
		$this->data['fleets']   = $this-> fleets -> viewAll();
		$this->render(); 
	}

	/**
	 * Show method for controller, shows specific information for a plane given its identifier
	 */
	public function show($id) {
        $role = $this->session->userdata('userrole');
		$this->data['pagebody'] = 'plane';
		$fleet_plane = $this -> fleets -> get ($id) -> getPlane ();
		$this->data['plane_info'] = array ("values" => $fleet_plane -> getViewArray ());
		$this -> render();
	}

	// Initiate adding a new task
    public function add()
    {
        $fleet_plane = $this->fleets->create();
        $this->session->set_userdata('fleet_plane', $fleet_plane);
        $this->showit();
    }
    
    // initiate editing of a task
    public function edit($id = null)
    {
        if ($id == null)
            redirect('/fleet');
        $fleet_plane = $this->fleets->get($id);
        $this->session->set_userdata('fleet_plane', $fleet_plane);
        $this->showit();
    }
    
    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
		$fleet_plane = $this->session->userdata('fleet_plane');
        $this->data['id'] = $fleet_plane->planeId;
        
        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        
        $fleets = $this->fleets->all();
		
		$locations = $this -> planes -> getPlanesForDropdown ();

        $fields = array(
			'planeId'     => form_label('id') . form_input('planeId', ''),
            'type'        => form_label('type') . form_dropdown('type', $locations, reset($locations)),
            'zsubmit'     => form_submit('submit', 'Update the flight'),
		);
		
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'fleetadd';
        $this->render();
    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        // $this->form_validation->set_rules($this->flights->rules());

        // retrieve & update data transfer buffer
        $fleet_plane = (array) $this->session->userdata('fleet_plane');
        // var_dump ($this->input->post());
        $fleet_plane = array_merge($fleet_plane, $this->input->post());
        $fleet_plane = (object) $fleet_plane;  // convert back to object
        $this->session->set_userdata('fleet_plane', (object) $fleet_plane);

        // validate away
        // if ($this->form_validation->run())
        // {
            if (empty($fleet_plane->planeId))
            {
                // $flight->uniqueId = $this->flights->highest() + 1;
                $fleet_plane->planeId = "a12345";
                // var_dump ($flight);
                $this->fleets->add($fleet_plane);
                $this->alert('Flight ' . $fleet_plane->planeId . ' added', 'success');
            } else
            {
                if (!empty ($this -> fleets -> get($fleet_plane -> planeId))) {
                    $this->fleets->update($fleet_plane);
                    $this->alert('Flight ' . $fleet_plane->planeId . ' updated', 'success');
                } else {
                    // var_dump ($flight);
                    $this->fleets->add($fleet_plane);
                    $this->alert('Flight ' . $fleet_plane->planeId . ' added', 'success');
                }
                
            }
      /* } else
       {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
       } */
        $this->showit();
	}
	
    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');        
        $this->data['error'] = heading($message,3);
    }

}