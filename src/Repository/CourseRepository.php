<?php 

class CourseRepository{
        private $conn;

        function __construct($conn)
        {
            $this->conn = $conn;
        }

        function create($data){
            $sql = "INSERT INTO courses (name, department_id, formateur_id, created_at) VALUES (:name, :department_id, :formateur_id, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $data[0]);
            $stmt->bindParam(":department_id", $data[1]);
            $stmt->bindParam(":formateur_id", $data[2]);
            $stmt->execute();
            return "Student has been created";
        }

        function read($condition){
            $sql = "SELECT $condition FROM courses";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            return $users;
        }

}