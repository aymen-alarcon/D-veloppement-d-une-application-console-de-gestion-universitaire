<?php
    class User{
        public $conn;
        protected $email;
        protected $password;

        function __construct($conn, $email, $password){
            $this->conn = $conn;
            $this->email = $email;
            $this->password = $password;
        }

        function getEmail(){
            return $this->email;
        }

        function getPassword(){
            return $this->password;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function setPassword($password){
            $this->password = $password;
        }
    }
?>