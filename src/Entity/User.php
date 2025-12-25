<?php
    class User extends Person{
        protected $password;
        protected $role;

        function __construct($password, $role, $email, $firstName, $lastName){
            parent::__construct($email, $firstName, $lastName);
            $this->password = $password;
            $this->role = $role;
        }

        function getPassword(){
            return $this->password;
        }

        function getRole(){
            return $this->role;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function setRole($role){
            $this->role = $role;
        }
    }
?>