<?php
require "Repository/UserRepository.php";
require "Entity/User.php";
require "Database/DatabaseConnection.php";

$connection = new DatabaseConnection();
$conn = $connection->establishConnection();

echo "=== Welcome to University Management CLI ===\n";

echo "Enter your email: ";
$email = trim(fgets(STDIN));

echo "Enter your password: ";
$password = trim(fgets(STDIN));

$service = new UserRepository($conn);
$user = $service->login($email, $password);

if (!$user) {
    echo "Invalid credentials.\n";
    exit;
}else{
    echo "good work";
}