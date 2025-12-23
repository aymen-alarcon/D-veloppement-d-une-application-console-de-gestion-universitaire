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

        function update($data){
            $sql = "UPDATE courses SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data[0]);
            $stmt->bindParam(":name", $data[1]);
            $stmt->execute();
        }

        function read($condition){
            $sql = "SELECT $condition FROM courses";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function delete($condition)
        {
            $sql = "DELETE FROM courses WHERE $condition";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
}