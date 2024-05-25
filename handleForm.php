<?php

// Get the form data from POST request

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $name = $_POST["name"];
$plainPassword = $_POST["password"];

if(empty($_POST["name"]) || empty($_POST['password'] )){

    $error = "all fields should be filled";
    die();
} 

// Hash the password for security
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
require 'Database.php';

$hostname = $_ENV['HOSTNAME1'];
$dbname = $_ENV['DBNAME1'];
$username = $_ENV['USERNAME1'];
$password = $_ENV['PASSWORD1'];

try {
    // Create a database instance
    $form_data_db = new Database($hostname, $dbname, $username, $password);

    // Define SQL query
    $sql = "INSERT INTO user_form_data (name, password) VALUES (:name, :password)";

    // Define parameters
    $params = [":name" => $name, ":password" => $hashedPassword];

    // Execute SQL query
      $form_data_db->query($sql, $params);

    echo "Data inserted successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


}

?>

