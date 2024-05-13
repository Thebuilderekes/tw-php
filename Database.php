<?php

require "./vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database
{
  public $hostname;
  public $dbname;
  public $username;
  public $password;
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

  public function query($sql, $params = []) {
    try {
      $statement = $this->connection->prepare($sql);
      $statement->execute($params);
      //        echo "data entry successful";
      // Adjust based on your expected return type
      return $statement;
    } catch (PDOException $e) {
      throw new Exception("Query failed: " . $e->getMessage());
    }
  
  }

  public function fetchItems($sql, $params) {
    try {
      $statement = $this->connection->prepare($sql);
      $statement->execute($params);
        //echo "data entry successful";
      // Adjust based on your expected return type
        return $statement;
    } catch (PDOException $e) {
      throw new Exception("Query failed: " . $e->getMessage());
    }
}
}

  echo "after database";
