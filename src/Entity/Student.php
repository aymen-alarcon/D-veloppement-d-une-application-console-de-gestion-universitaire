<?php
    class Student{
        protected $id;
        protected $email;
        protected $password;
        protected $firstName;
        protected $lastName;
        protected $department_id;
        protected $course_id; 

        function __construct($id, $email, $password, $firstName, $lastName, $course_id, $department_id){
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->department_id = $department_id;
            $this->course_id = $course_id;
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
        
        function getCourse_id(){
            return $this->course_id;
        }
        
        function getDepartment_id(){
            return $this->department_id;
        }
        
        function setEmail($email){
            $this->email = $email;
        }
        
        function setPassword($password){
            $this->password = $password;
        }
        
        function setFirstName($firstName){
            $this->firstName = $firstName;
        }
        
        function setLastName($lastName){
            $this->lastName = $lastName;
        }

        function setCourse_id ($course_id){
            $this->course_id  = $course_id;
        }

        function setDepartment_id($department_id){
            $this->department_id  = $department_id;
        }
    }
?>