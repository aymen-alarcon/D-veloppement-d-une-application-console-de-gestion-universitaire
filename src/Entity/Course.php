<?php
    class Course{
        protected $id;
        protected $name;
        protected $table;
        protected $departmentId;

        function __construct($id, $name, $table, $departmentId){
            $this->id = $id;
            $this->name = $name;
            $this->table = $table;
            $this->departmentId = $departmentId;
        }

        function getId(){
            return $this->id;
        }

        function getTable(){
            return $this->table;
        }
        
        public function getName()
        {
            return $this->name;
        }

        function setTable(string $table){
            $this->table = $table;
        }    

        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        public function getDepartment()
        {
            return $this->departmentId;
        }

        public function setDepartment($departmentId)
        {
            $this->departmentId = $departmentId;

            return $this;
        }
    }
?>