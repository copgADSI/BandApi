<?php
 class ConnectionDB {
     private $host = 'localhost';
     private $dbname = 'api';
     private $user = 'root';
     private $pass = '';
     private $conn;
     public function getCon()
     {
         $connectionString = "mysql: host=".$this->host.";dbname=".$this->dbname.";charset=utf8";
         try {
             $this->conn = new PDO($connectionString,$this->user,$this->pass);
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
              return $this->conn;    
         } catch (PDOException $e) {
             echo 'Error' .  $e->getMessage();
         }
     }
 }

?>
