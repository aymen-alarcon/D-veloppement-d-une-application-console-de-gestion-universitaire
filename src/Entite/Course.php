<?php
    class Course{
        public $conn;
        protected $id;
        protected $email;
        protected $password;
        protected $role;

        function __construct($conn, $id, $email, $password, $role){
            $this->conn = $conn;
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
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
        function getRole(){
            return $this->role;
        }
    }
?>