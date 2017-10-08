<?php
    /*
        Model for Flights.
        Gets all airports from Airports model and creates list of fights from
        Albatros airport.
    */
    class Flights extends CI_Model {
        var $data;
        var $airports;
        var $planes;

        // Constructor, gets all albatros related airports and creates a flight list
        function __construct () {
            parent::__construct();

            $this -> airports = $this -> airlines -> get('albatros');
            $this -> planes   = $this -> fleets   -> all ();
            $this -> data = array();

            foreach ($this -> planes as $key => $record) {

                $flight = array(
                    'a1' => array(
                        'departureLocation' => $this -> airports['base'],
                        'destinationLocation' => $this -> airports['dest1'],
                        'departureTime' => '0800',
                        'arrivalTime' => '1100',
                        'aircraftCode' => $key,
                    ),
                    'a2' => array(
                        'departureLocation' => $this -> airports['dest1'],
                        'destinationLocation' => $this -> airports['dest2'],
                        'departureTime' => '1130',
                        'arrivalTime' => '1430',
                        'aircraftCode' => $key,
                    ),
                    'a3'  => array(
                        'departureLocation' => $this -> airports['dest2'],
                        'destinationLocation' => $this -> airports['base'],
                        'departureTime' => '1500',
                        'arrivalTime' => '1930',
                        'aircraftCode' => $key,
                    ),
                    'a4' => array(
                        'departureLocation' => $this -> airports['base'],
                        'destinationLocation' => $this -> airports['dest3'],
                        'departureTime' => '0900',
                        'arrivalTime' => '1200',
                        'aircraftCode' => $key,
                    ),
                    'a5' => array(
                        'departureLocation' => $this -> airports['dest3'],
                        'destinationLocation' => $this -> airports['base'],
                        'departureTime' => '1230',
                        'arrivalTime' => '1530',
                        'aircraftCode' => $key,
                    ),
                );

                array_push ($this -> data, $flight);

            }
        }

        // returns airports for the flights
        function flight_airports () {
            return $this -> airports;
        }

        // returns name of base airport
        function base_name () {
            return $this -> airports['base'];
        }

        // returns number of flights
        function count_flights () {
            return count ($this -> data);
        }

        // Returns all the flights in the schedule
        function all () {
            return $this -> data;
        }

        // Returns a flight from the schedule
        function get ($which) {
            return !isset ($this->data[$which]) ? null : $this -> data[$which];
        }

    }
?>