<?php

    /*
        Model for Flights.
        Gets all airports from Airports model and creates list of fights from
        Albatros airport.
    */
    class Flights extends CSV_Model {

        private static $fleetdata = APPPATH . '/data/flights.csv';
        var $airline;
        
        // Constructor, gets all albatros related airports and creates a flight list
        function __construct () {
            parent::__construct(Flights::$fleetdata, 'uniqueId');
            $this -> airline = AirlineEntity::create_airline_from_arr_with_api_with_id ('albatros');
        }

        /**
    	 * Load the collection state appropriately, depending on persistence choice.
    	 * OVER-RIDE THIS METHOD in persistence choice implementations
    	 */
    	protected function load()
    	{
    		//---------------------
    		if (($handle = fopen($this->_origin, "r")) !== FALSE)
    		{
    			$first = true;
    			while (($data = fgetcsv($handle)) !== FALSE)
    			{
    				if ($first)
    				{
    					// populate field names from first row
    					$this->_fields = $data;
    					$first = false;
    				}
    				else
    				{
    					// build object from a row
    					$record = new stdClass();
    					for ($i = 0; $i < count($this->_fields); $i++ )
    						$record->{$this->_fields[$i]} = $data[$i];
                        $key = $record->{$this->_keyfield};
                        
                        $record = $this -> convert_record ($record);
                        $this->_data[$key] = $record;
    				}
    			}
    			fclose($handle);
    		}
    		// --------------------
    		// rebuild the keys table
    		$this->reindex();
        }
        
        function convert_record ($record) {
            return (is_array($record)) ? FlightEntity::create_flight_and_airport_from_arr ($record) : FlightEntity::create_flight_and_airport_from_obj ($record);
        }

        // Add a record to the collection
    	function add($record)
    	{
    		$record = $this -> convert_record ($record);
    		parent::add ($record);
    	}

        // returns airports for the flights
        function flight_airports () {
            return $this -> airline -> getAirports();
        }

        function get_flight_airline () {
            return $this -> airline;
        }

        // Can be replaced with size as inherited from CSV_Model
        // returns number of flights
        function count_flights () {
            return count ($this -> _data);
        }

        // Returns all the flights in the schedule
        /*
        function all () {
            return $this -> _data;
        } */

        function viewAll () {
            $arr = array ();
            foreach ($this -> _data as $key => $record) {
                array_push ($arr, $record -> getViewArray());
            }

            return $arr;
        }

        // Returns a flight from the schedule
        /* function get_flight ($which) {
            return !isset ($this -> _data[$which]) ? null : $this -> _data[$which];
        } */

    }
?>