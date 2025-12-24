<?php 

class CourseRepository implements CrudInterface{
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