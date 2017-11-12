<?php

    /*
        Model for fleet.
        Gets all plane data from Plane and creates fleet using name
    */
    class Fleets extends CSV_Model {

        private static $fleetdata = APPPATH . '/data/fleet.csv';

        // Constructor, gets all planes and adds to data array planes that are in the fleet
        function __construct () {
			parent::__construct(Fleets::$fleetdata, 'planeId');
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
            return (is_array($record)) ? FleetEntity::create_fleet_entity_from_arr ($record) : FleetEntity::create_fleet_entity_from_obj ($record);
        }

        // Add a record to the collection
    	function add($record)
    	{
    		$record = $this -> convert_record ($record);
    		parent::add ($record);
    	}

        // return number of planes in the fleet
        function count_planes () {
            return count ($this -> _data);
        }

		// Returns all the planes in the fleet
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

        // Returns a plane which is in the fleet
        /* function get_plane ($which) {
            return !isset ($this -> _data[$which]) ? null : $this -> _data[$which];
		} */

    }
?>