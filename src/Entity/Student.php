<?php
    class Student extends Person{
        protected $id;
        protected $password;
        protected $department_id;
        protected $course_id; 
        protected $table;

        function __construct($id, $course_id, $department_id, $table, $email, $firstName, $lastName){
            parent::__construct($email, $firstName, $lastName);
            $this->id = $id;
            $this->department_id = $department_id;
            $this->course_id = $course_id;
            $this->table = $table;
        }

        function getId(){
            return $this->id;
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