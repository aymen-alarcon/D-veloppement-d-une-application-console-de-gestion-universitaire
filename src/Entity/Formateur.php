<?php
    class Formateur extends Person{
        protected $id;
        protected $password;
        protected $table;

        function __construct($id, $table, $email, $firstName, $lastName){
            parent::__construct($email, $firstName, $lastName);
            $this->id = $id;
            $this->table = $table;
        }

        function getId(){
            return $this->id;
        }
        
        function getTable(){
            return $this->table;
        }
        
        function setTable($table){
            $this->table = $table;
        }
    }
?>