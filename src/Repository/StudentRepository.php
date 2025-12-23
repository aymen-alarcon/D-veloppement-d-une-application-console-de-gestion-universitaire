<?php
    class StudentRepository implements CrudInterface{
        private $conn;

        function __construct($conn)
        {
            $this->conn = $conn;
        }

        function create($data){
            $sql = "INSERT INTO students (first_name, last_name, email, created_at) VALUES (:first_name, :last_name, :email,NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":first_name", $data[0]);
            $stmt->bindParam(":last_name", $data[1]);
            $stmt->bindParam(":email", $data[2]);
            $stmt->execute();
            return "Student has been created";
        }

        function update($data){
            $sql = "UPDATE students  SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data[0]);
            $stmt->bindParam(":first_name", $data[1]);
            $stmt->bindParam(":last_name", $data[2]);
            $stmt->bindParam(":email", $data[3]);
            $stmt->execute();
        }

        function read($condition){
            $sql = "SELECT $condition FROM students";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function delete($condition)
        {

        }
    }