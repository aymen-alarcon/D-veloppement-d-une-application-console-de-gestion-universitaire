<?php
    class Course{
        protected $id;
        protected $email;
        protected $password;
        protected $role;
        protected $table;

        function __construct($id, $email, $password, $role, $table){
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
            $this->table = $table;
        }

        function getId(){
            return $this->id;
        }

        function getEmail(){
            return $this->email;
        }

        function getRole(){
            return $this->role;
        }

        function getPassword(){
            return $this->password;
        }

        function getTable(){
            return $this->table;
        }

        function setEmail(string $email){
            $this->email = $email;
        }

        function setPassword(string $password){
            $this->password = $password;
        }

        function setRole(string $role){
            $this->role = $role;
        }     
        
        function setTable(string $table){
            $this->table = $table;
        }
    }
?>