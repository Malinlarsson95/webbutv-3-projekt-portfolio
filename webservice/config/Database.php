<?php
    class Database {
        //Databas inställningar
        private $host = 'localhost';
        private $db_name = 'portfolio';
        private $username = 'portfolio';
        private $password = 'password';
        private $conn;

        //Funktion för att koppla till databasen
        public function connect() {
            $this->conn = null;
            
            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Vid fel vid uppkoppling till databasen
            } catch(PDOException $e) {
                echo "Connection Error " . $e->getMessage();
            }
            return $this->conn;
        }
    }
?>