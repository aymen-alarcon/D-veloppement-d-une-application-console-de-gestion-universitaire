<?php

class CourseRepository implements CrudInterface{
        private $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }

        function create(Course $course){
            $sql = "INSERT INTO {$course->getTable()} (name, department_id, formateur_id, created_at) VALUES (:name, :department_id, :formateur_id, NOW())";
            $stmt = $this->conn->prepare($sql);
            $name = $course->getName();
            $courseId = $course->getCourseId();
            $formateurId = $course->getFormateur();
            $name = $course->getName();
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":department_id", $formateurId);
            $stmt->bindParam(":formateur_id", $courseId);
            $stmt->execute();
            return "Student has been created";
        }

        function update(Course $course){
            $sql = "UPDATE {$course->getTable()} SET name = :name, department_id = :department_id , formateur_id = :formateur_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $id = $course->getId();
            $name = $course->getName();
            $courseId = $course->getCourseId();
            $formateurId = $course->getFormateur();
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":department_id", $formateurId);
            $stmt->bindParam(":formateur_id", $courseId);
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