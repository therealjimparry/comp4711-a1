<?php

    /*
        Class for models to use so that controller have an easier time with objects.
        Functions to help controller with accessing model items.
     */
    class Model_Controller_Helper extends CSV_Model {

        function viewAll () {
            $arr = array ();
            foreach ($this -> _data as $key => $record) {
                array_push ($arr, $record -> getViewArray());
            }
            return $arr;
        }

       /**
    	 * Store the collection state appropriately, depending on persistence choice.
    	 * OVER-RIDE THIS METHOD in persistence choice implementations
    	 */
    	protected function store()
    	{
    		// rebuild the keys table
    		$this->reindex();
    		//---------------------
    		if (($handle = fopen($this->_origin, "w")) !== FALSE)
    		{
    			fputcsv($handle, $this->_fields);
    			foreach ($this->_data as $key => $record) {
    				$record = $record -> getCSVArray();
    				fputcsv($handle, array_values((array) $record));
    			}
    			fclose($handle);
    		}
    		// --------------------
    	}

    }

?>

