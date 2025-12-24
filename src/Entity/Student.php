<?php
    class Student{
        protected $id;
        protected $email;
        protected $password;
        protected $firstName;
        protected $lastName;
        protected $department_id;
        protected $course_id; 
        protected $table;

        function __construct($id, $email, $firstName, $lastName, $course_id, $department_id, $table){
            $this->id = $id;
            $this->email = $email;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->department_id = $department_id;
            $this->course_id = $course_id;
            $this->table = $table;
        }

        function getId(){
            return $this->id;
        }
        
        function getEmail(){
            return $this->email;
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

        function getTable(){
            return $this->table;
        }
        
        function setEmail($email){
            $this->email = $email;
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

        function setTable($table){
            $this->table = $table;
        }
    }
?>