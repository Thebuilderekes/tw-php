<?php


class Database {

  protected $connection;

  public function __construct($hostname, $dbname, $username, $password) {



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
        echo "data entry successful";
      // Adjust based on your expected return type
        return $statement;
    } catch (PDOException $e) {
      throw new Exception("Query failed: " . $e->getMessage());
    }
  }
}
