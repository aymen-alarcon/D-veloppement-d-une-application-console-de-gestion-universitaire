<?php

class DepartmentRepository implements CrudInterface{
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

        function update($data){
            $sql = "UPDATE departments SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data[0]);
            $stmt->bindParam(":name", $data[1]);
            $stmt->execute();
        }

        function read($condition){
            $sql = "SELECT $condition FROM departments";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function delete($condition)
        {
            $sql = "DELETE FROM departments WHERE $condition";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
}