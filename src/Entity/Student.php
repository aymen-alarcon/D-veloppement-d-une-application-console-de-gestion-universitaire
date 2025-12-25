<?php
    class Student extends Person{
        protected $table;

        function __construct($id, $table, $email, $firstName, $lastName){
            parent::__construct($id, $email, $firstName, $lastName);
            $this->table = $table;
        }

        function getTable(){
            return $this->table;
        }
        
        function setTable($table){
            $this->table = $table;
        }
    }
?>