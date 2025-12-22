<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=gestion universitire", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new Exception("Error Processing Request", 1);
    }
?>