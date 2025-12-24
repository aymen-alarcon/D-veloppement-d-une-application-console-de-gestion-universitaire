<?php
    class Department{
        protected $id;
        protected $name;
        protected $table;

        function __construct($id, $name, $table){
            $this->id = $id;
            $this->name = $name;
            $this->table = $table;
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

        function getTable(){
            return $this->table;
        }

        function setTable($table){
            $this->table = $table;
        }
    }
?>