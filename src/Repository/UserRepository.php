<?php

class UserRepository {
    protected $conn;
    protected $email;
    protected $password;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user["password"]) {
            return new User($user["email"], $user["password"], $user["role"]);
        }
    }
}