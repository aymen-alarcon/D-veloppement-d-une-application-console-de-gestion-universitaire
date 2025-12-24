<?php

class DepartmentRepository implements CrudInterface{
        private string $table;
        private $conn;

        public function __construct(PDO $conn, string $table = "courses")
        {
            $this->conn = $conn;
            $this->table = $table;
        }

        public function useTable(string $table)
        {
            $this->table = $table;
        }

        function create($name){
            $sql = "INSERT INTO {$this->table} (name, created_at) VALUES (:name, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            return "Student has been created";
        }

        function update($data){
            $sql = "UPDATE {$this->table} SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":name", $data["name"]);
            $stmt->execute();
        }

        function read($condition){
            $sql = "SELECT $condition FROM {$this->table}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function delete($condition){
            $sql = "DELETE FROM {$this->table} WHERE $condition";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
}