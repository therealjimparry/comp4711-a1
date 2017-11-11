<?php

    require_once APPPATH . 'core/Entity.php';

    /*
        Model for fleet
     */
    class FleetEntity extends Entity {

        protected $planes;

        function __construct ($planes = null) {
            parent::__construct();
            $this -> planes = $planes;
        }

        public function setPlanes ($value) {
            $this -> planes = $value;
        }

        public function addPlane ($value) {
            array_push ($this -> planes, $value);
        }

        public function removePlane ($id) {
            if (empty ($this -> planes))
                return;
            foreach ($this -> planes as $key => $record) {
                if ($key == $id)
                    unset ($this -> planes[$key]);
            }
        }

        public function getPlanes () {
            return $this -> planes;
        }

    }

?>