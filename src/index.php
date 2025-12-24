<?php
require __DIR__ . "/autoload.php";

$db = new DatabaseConnection();
$conn = $db->establishConnection();

$service = new UserService($conn);
$service->run();