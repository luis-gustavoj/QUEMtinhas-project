<?php
    class ong{

        private $id;
        protected $name;
        protected $desc;
        protected $place;
        protected $dailyCapacity;
        protected $eatingToday;

        public function __construct($name, $desc, $place, $dailyCapacity){
            $this->name = $name;
            $this->desc = $desc;
            $this->place = $place;
            $this->dailyCapacity = $dailyCapacity;
            $this->eatingToday = 0;
        }

        public function get_id(){
            return $this->id;
        }

        public function set_name($name){
            $this->name = $name;
        }

        public function get_name(){
            return $this->name;
        }

        public function set_desc($desc){
            $this->desc = $desc;
        }

        public function get_desc(){
            return $this->desc;
        }

        public function set_place($place){
            $this->place = $place;
        }

        public function get_place(){
            return $this->place;
        }

        public function set_dailyCapacity($dailyCapacity){
            $this->dailyCapacity = $dailyCapacity;
        }

        public function get_dailyCapacity(){
            return $this->dailyCapacity;
        }

        public function set_eatingToday($eatingToday){
            $this->eatingToday = $eatingToday;
        }

        public function get_eatingToday(){
            return $this->eatingToday;
        }
    }
?>