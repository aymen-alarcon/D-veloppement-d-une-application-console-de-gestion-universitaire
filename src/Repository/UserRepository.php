<?php

class UserRepository {
    protected $conn;
    protected $email;
    protected $password;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login(User $user) {
        
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $email = $user->getEmail();
        $stmt->execute([$email]);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $password = $user->getPassword();
        if ($users && $password == $users["password"]) {
            $user->setRole($users["role"]);
            return $users;
        }
    }

    public function read($columns, $table, $where = "", $params = []) {
        $sql = "SELECT $columns FROM $table $where";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCoursesByDepartment($departmentId) {
        return $this->read(
            "c.*",
            "courses c",
            "WHERE c.department_id = ?",
            [$departmentId]
        );
    }

    public function getCoursesByFormateur($formateurId) {
        return $this->read(
            "c.*",
            "courses c JOIN formateurs_course fc ON c.id = fc.course_id",
            "WHERE fc.formateur_id = ?",
            [$formateurId]
        );
    }

    public function getStudentsByDepartment($departmentId) {
        return $this->read(
            "*",
            "students",
            "WHERE department_id = ?",
            [$departmentId]
        );
    }

    public function getCoursesByStudent($studentId) {
        return $this->read(
            "c.*",
            "courses c JOIN student_course sc ON c.id = sc.course_id",
            "WHERE sc.student_id = ?",
            [$studentId]
        );
    }
}