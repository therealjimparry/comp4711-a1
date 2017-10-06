<?php
    /*
        Model for Flights.
        Gets all airports from Airports model and creates list of fights from
        Albatros airport.
    */
    class Flights extends CI_Model {
        var $data;
        var $airports;

        // Constructor, gets all albatros related airports and creates a flight list
        function __construct () {
            parent::__construct();

            $airports = $this -> airlines -> get('albatros');

            $this -> data = array(
                'a1' => array(
                    'departureLocation' => $airports['base'],
                    'destinationLocation' => $airports['dest1'],
                    'departureTime' => '0800',
                    'arrivalTime' => '1100'
                ),
                'a2' => array(
                    'departureLocation' => $airports['dest1'],
                    'destinationLocation' => $airports['dest2'],
                    'departureTime' => '1130',
                    'arrivalTime' => '1430'
                ),
                'a3'  => array(
                    'departureLocation' => $airports['dest2'],
                    'destinationLocation' => $airports['base'],
                    'departureTime' => '1500',
                    'arrivalTime' => '1930'
                ),
                'a4' => array(
                    'departureLocation' => $airports['base'],
                    'destinationLocation' => $airports['dest3'],
                    'departureTime' => '0900',
                    'arrivalTime' => '1200'
                ),
                'a5' => array(
                    'departureLocation' => $airports['dest3'],
                    'destinationLocation' => $airports['base'],
                    'departureTime' => '1230',
                    'arrivalTime' => '1530'
                ),
            );

        }

        // Returns all the flights in the schedule
        function all () {
            return $this -> data;
        }

        // Returns a flight from the schedule
        function get ($which) {
            return !isset ($this->data[$which]) ? null: $this -> data[$which];
        }

    }
?>