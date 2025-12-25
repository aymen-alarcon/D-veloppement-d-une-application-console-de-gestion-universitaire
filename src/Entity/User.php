<?php
    class User extends Person{
        protected $email;
        protected $password;
        protected $role;

        function __construct($password, $role, $email){
            $this->email = $email;
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

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
    }
?>