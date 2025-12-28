<?php

class DepartmentRepository implements CrudInterface{
        private $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }

        function create($department){
            $sql = "INSERT INTO {$department->getTable()} (name, created_at) VALUES (:name, NOW())";
            $stmt = $this->conn->prepare($sql);
            $name = $department->getName();
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            return "Student has been created";
        }
        
        function update($department){
            $sql = "UPDATE {$department->getTable()} SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $id= $department->getId();
            $name = $department->getName();
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
        }

        function read($condition, $table){
            $sql = "SELECT $condition FROM $table";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function delete($condition, $table){
            $sql = "DELETE FROM $table WHERE $condition";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
}