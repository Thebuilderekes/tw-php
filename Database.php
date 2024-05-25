<?php

require "../vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database
{
  public $hostname;
  public $dbname;
  public $username;
  public $password;
  public $statement;
  protected $connection;
  

  public function query($sql, $params = []) {
    try {
      $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
       echo "data entry successful";
        return $this->fetchStatement();
      //$this->fetchStatement() returns $this->statement
    } catch (PDOException $e) {
      throw new Exception("Query failed: " . $e->getMessage());
    }
  
  }

  public function fetchItems($sql) {
    try {
      $this->statement = $this->connection->prepare($sql);
      $this->statement->execute();

      return $this->fetchStatement();

      //$this->fetchStatement() returns $this->statement
    } catch (PDOException $e) {
      throw new Exception("Query failed: " . $e->getMessage());
    }
  }

// fetchItems and query methods use to return the $statement directly in them but this refactor  allows the statement to be a function by itself in order to make it accessible to other methods in the database
  public function fetchStatement(){
    
        return $this->statement;

  }






}



