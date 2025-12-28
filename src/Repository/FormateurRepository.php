<?php

class FormateurRepository implements CrudInterface{
        private $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }

        function create($formateur){
            $sql = "INSERT INTO {$formateur->getTable()} (first_name, last_name, email, created_at) VALUES (:first_name, :last_name, :email,NOW())";
            $stmt = $this->conn->prepare($sql);
            $fname = $formateur->getFirstName();
            $lname = $formateur->getLastName();
            $email = $formateur->getEmail();
            $stmt->bindParam(":first_name", $fname);
            $stmt->bindParam(":last_name", $lname);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return "Student has been created";
        }

        function update($formateur){
            $sql = "UPDATE {$formateur->getTable()} SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $id = $formateur->getId();
            $fname = $formateur->getFirstName();
            $lname = $formateur->getLastName();
            $email = $formateur->getLastName();
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":first_name", $fname);
            $stmt->bindParam(":last_name", $lname);
            $stmt->bindParam(":email", $email);
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
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
}