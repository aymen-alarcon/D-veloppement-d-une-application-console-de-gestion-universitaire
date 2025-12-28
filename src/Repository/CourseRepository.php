<?php

class CourseRepository implements CrudInterface{
        private $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }

        function create($course){
            $sql = "INSERT INTO {$course->getTable()} (name, department_id, created_at) VALUES (:name, :department_id, NOW())";
            $stmt = $this->conn->prepare($sql);
            $name = $course->getName();
            $departmentId = $course->getDepartment();
            $name = $course->getName();
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":department_id", $departmentId);
            $stmt->execute();
            return "Student has been created";
        }

        function update($course){
            $sql = "UPDATE {$course->getTable()} SET name = :name, department_id = :department_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $id = $course->getId();
            $name = $course->getName();
            $departmentId = $course->getDepartment();
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":department_id", $departmentId);
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

        function assignToCourse($table, $entityColumn, $entityId, $courseId){
            $sql = "INSERT INTO $table (course_id, $entityColumn) VALUES (:course_id, :$entityColumn)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":course_id", $courseId);
            $stmt->bindParam(":$entityColumn", $entityId);
            $stmt->execute();
        }
}