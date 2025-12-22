<?php
    class Department{
        public $conn;
        protected $id;
        protected $name;

        function __construct($conn, $id, $name){
            $this->conn = $conn;
            $this->id = $id;
            $this->name = $name;
        }

        function getId(){
            return $this->id;
        }

        function getName(){
            return $this->name;
        }

        function setName($name){
            $this->name = $name;
        }
    }
?>