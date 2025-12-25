<?php
    class Formateur extends Person{
        protected $id;
        protected $password;
        protected $table;

        function __construct($id, $table, $firstName, $lastName, $email){
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