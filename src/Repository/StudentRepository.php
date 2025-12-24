<?php    
    class StudentRepository extends Student implements CrudInterface{
        private $conn;
        
        function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        function useTable(string $table){
            $this->setTable($table);
        }

        function create($data){
            $columns = implode(" ,", array_keys($data));
            $values = implode(" ,:", array_keys($data));
            $sql = "INSERT INTO {$this->table} ($columns, created_at) VALUES (:$values,NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":first_name", $data["first_name"]);
            $stmt->bindParam(":last_name", $data["last_name"]);
            $stmt->bindParam(":email", $data["email"]);
            return $this->conn->lastInsertId();
        }

        function update($data){
            $sql = "UPDATE {$this->table}  SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":first_name", $data["first_name"]);
            $stmt->bindParam(":last_name", $data["last_name"]);
            $stmt->bindParam(":email", $data["email"]);
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

        function updateCourse($data){
            $sql = "UPDATE {$this->table}  SET course_id = :course_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":course_id", $data["course_id"]);
            $stmt->execute();
        }
    }