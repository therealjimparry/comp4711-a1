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
		$this->data['pagebody'] = 'flight';
		$this->data['all_flights']  = $this -> flights -> viewAll();
		$this->render();

    }

    // Initiate adding a new task
    public function add()
    {
        $flight = $this->flights->create();
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }
    
    // initiate editing of a task
    public function edit($id = null)
    {
        if ($id == null)
            redirect('/flight');
        $flight = $this->flights->get($id);
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }
    
    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $flight = $this->session->userdata('flight');
        $this->data['id'] = $flight->uniqueId;
        
        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        
        $fleets = $this->fleets->all();
        $planeIds = array();
        foreach ($fleets as $fleet)
            $planeIds[$fleet->plane->uniqueId] = $fleet->plane->uniqueId;
            // array_push($planeIds, $fleet->plane->uniqueId);

        $albatros = AirlineEntity::create_airline_from_arr_with_api_with_id('albatros');
        // $locations = [$albatros['base'], $albatros['dest1'], $albatros['dest2'], $albatros['dest3']];
        $locations = $albatros -> getAirportsForDropdown ();

        $fields = array(
            'fflightnumber'     => form_label('FlightNumber') . form_input('uniqueId', $flight->uniqueId),
            'faircraft'         => form_label('Aircraft') . form_dropdown('planeId', $planeIds),
            'fdeparture'        => form_label('Departure Location') . form_dropdown('departureLocation', $locations, $flight->departureLocation),
            'farrival'          => form_label('Arrival Location') . form_dropdown('destinationLocation', $locations, $flight->destinationLocation),
            'fdeparturetime'    => form_label('Departure Time') . form_input('departureTime', $flight->departureTime),
            'farrivaltime'      => form_label('Arrival Time') . form_input('arrivalTime', $flight->arrivalTime),
            'zsubmit'           => form_submit('submit', 'Update the flight'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'flightedit';
        $this->render();
    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        // $this->form_validation->set_rules($this->flights->rules());

        // retrieve & update data transfer buffer
        $flight = (array) $this->session->userdata('flight');
        // var_dump ($this->input->post());
        $flight = array_merge($flight, $this->input->post());
        $flight = (object) $flight;  // convert back to object
        $this->session->set_userdata('flight', (object) $flight);

        // validate away
        // if ($this->form_validation->run())
        // {
            if (empty($flight->uniqueId))
            {
                // $flight->uniqueId = $this->flights->highest() + 1;
                $flight->uniqueId = "a12345";
                // var_dump ($flight);
                $this->flights->add($flight);
                $this->alert('Flight ' . $flight->uniqueId . ' added', 'success');
            } else
            {
                if (!empty ($this -> flights -> get($flight -> uniqueId))) {
                    $this->flights->update($flight);
                    $this->alert('Flight ' . $flight->uniqueId . ' updated', 'success');
                } else {
                    // var_dump ($flight);
                    $this->flights->add($flight);
                    $this->alert('Flight ' . $flight->uniqueId . ' added', 'success');
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