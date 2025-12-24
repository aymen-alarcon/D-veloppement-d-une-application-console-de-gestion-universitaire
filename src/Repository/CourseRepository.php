<?php 

class CourseRepository extends Course implements CrudInterface{
        private $conn;

        function __construct($conn)
        {
            $this->conn = $conn;
        }

        function useTable(string $table){
            $this->setTable($table);
        }

        function create($data){
            $columns = implode(" ,", array_keys($data));
            $values = implode(" ,:", array_keys($data));
            $sql = "INSERT INTO {$this->table} ($columns, created_at) VALUES (:$values, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $data["name"]);
            $stmt->bindParam(":department_id", $data["department_id"]);
            $stmt->bindParam(":formateur_id", $data["formateur_id"]);
            $stmt->execute();
            return "Student has been created";
        }

        function update($data){
            $sql = "UPDATE {$this->table} SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data[0]);
            $stmt->bindParam(":name", $data[1]);
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
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
}