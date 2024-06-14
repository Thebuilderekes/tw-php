<?php

require_once "Database.php";

class MakeConnection extends Database
{
  protected $connection;
  

  public function __construct($hostname, $dbname, $username, $password) {

     $this->hostname = $hostname;
     $this->dbname   = $dbname; 
     $this->username = $username;
    $this->password = $password;

    // Connect to the database
    try {
      $this->connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      throw new Exception("Connection failed: " . $e->getMessage());
    }
  }


}
