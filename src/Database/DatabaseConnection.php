<?php
    class DatabaseConnection{
        protected $conn;

        function establishConnection(){
            try {
                $this->conn = new PDO("mysql:host=localhost;dbname=gestion_universitaire", "root", "");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new Exception("Error Processing Request", 1);
            
            }
            return $this->conn;
        }
    }
?>