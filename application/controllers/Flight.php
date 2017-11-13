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
        foreach ($fleets as $fleet) {
            array_push($planeIds, $fleet->plane->uniqueId);
        }
        $albatros = WackyAPI::getAlbatros();
        $locations = [$albatros['base'], $albatros['dest1'], $albatros['dest2'], $albatros['dest3']];

        $fields = array(
            'fflightnumber'     => form_label('FlightNumber') . form_input('flightnumber', $flight->uniqueId),
            'faircraft'         => form_label('Aircraft') . form_dropdown('aircraft', $planeIds),
            'fdeparture'        => form_label('Departure Location') . form_dropdown('departurelocation', $locations),
            'farrival'          => form_label('Arrival Location') . form_dropdown('arrivallocation', $locations),
            'fdeparturetime'    => form_label('Departure Time') . form_input('departtime', $flight->departureTime),
            'farrivaltime'      => form_label('Arrival Time') . form_input('arrivetime', $flight->arrivalTime),
            'zsubmit'           => form_submit('submit', 'Update the TODO task'),
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
        $flight = array_merge($flight, $this->input->post());
        $flight = (object) $flight;  // convert back to object
        $this->session->set_userdata('flight', (object) $flight);

        // validate away
        if ($this->form_validation->run())
        {
            if (empty($flight->uniqueId))
            {
                // $flight->uniqueId = $this->flights->highest() + 1;
                $flight->uniqueId = "a12345";
                $this->flights->add($flight);
                $this->alert('Flight ' . $flight->uniqueId . ' added', 'success');
            } else
            {
                $this->flights->update($flight);
                $this->alert('Flight ' . $flight->uniqueId . ' updated', 'success');
            }
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }
    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');        
        $this->data['error'] = heading($message,3);
    }
    
}