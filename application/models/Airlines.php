<?php
    /*
        Model for airlines.
        Gets all airlines json data from server
    */
    class Airlines extends CI_Model 
    {
        var $data;

        // Default constructor; creates model
        public function __construct () 
        {
            parent::__construct ();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //change to true before you push
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'https://wacky.jlparry.com/info/airlines');
            $result = curl_exec($ch);
            curl_close($ch);
            $this -> data = json_decode($result, true);
            foreach ($this -> data as $key => $record) {
                $record['key'] = "a{$key}";
                $this->data["a{$key}"] = $record;
            }
            $this->data['baseC'] = 'Bella Coola';
        }

        // Returns all airlines
        public function all() 
        {
            return $this -> data;
        }

        // Returns a specific airline
        public function get($which)
        {
            foreach ($this -> data as $value)
                if ($value["id"] == $which)
                    return $value;
            return null;
        }
    }
?>