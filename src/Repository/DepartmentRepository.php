<?php

class DepartmentRepository{
        private $conn;

        function __construct($conn)
        {
            $this->conn = $conn;
        }

        function create($data){
            $sql = "INSERT INTO departments (name, created_at) VALUES (:name, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $data[0]);
            $stmt->execute();
            return "Student has been created";
        }

        function read($condition){
            $sql = "SELECT $condition FROM departments";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
}