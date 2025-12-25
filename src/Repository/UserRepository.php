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

        if ($users && $password === $user["password"]) {
            return new User($users["email"], $users["password"], $users["role"]);
        }
    }
}