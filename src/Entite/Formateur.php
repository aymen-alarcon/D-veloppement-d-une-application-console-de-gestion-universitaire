<?php
    class Course{
        public $conn;
        protected $id;
        protected $email;
        protected $password;
        protected $firstName;
        protected $lastName;

        function __construct($conn, $id, $email, $password, $firstName, $lastName){
            $this->conn = $conn;
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        function getId(){
            return $this->id;
        }
        function getEmail(){
            return $this->email;
        }
        function getPassword(){
            return $this->password;
        }
        function getFirstName(){
            return $this->firstName;
        }
        function getLastName(){
            return $this->lastName;
        }
    }
