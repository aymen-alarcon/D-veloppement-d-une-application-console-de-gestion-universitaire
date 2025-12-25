<?php    
    class StudentRepository implements CrudInterface{
        private PDO $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }


    public function create(Student $student){
        $sql = "INSERT INTO {$student->getTable()} (first_name, last_name, email, created_at) VALUES (:first_name, :last_name, :email, NOW())";
        $stmt = $this->conn->prepare($sql);
        $fname = $student->getFirstName();
        $lname = $student->getLastName();
        $email = $student->getEmail();
        $stmt->bindParam(":first_name", $fname);
        $stmt->bindParam(":last_name", $lname);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }

    public function update(Student $student){
        $sql = "UPDATE {$student->getTable()}  SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $id = $student->getId();
        $fname = $student->getFirstName();
        $lname = $student->getLastName();
        $email = $student->getLastName();
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

    function readAll($id){
        $sql = "SELECT c.name FROM courses c JOIN student_course s ON c.id = s.course_id AND s.student_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}