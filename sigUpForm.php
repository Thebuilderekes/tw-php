<?php

// Get the form data from POST request

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$plainPassword = $_POST["password"];

if(empty($_POST["email"]) || empty($_POST['password'] )){

    $error['form-error'] = "all fields should be filled";
    die();
} 

// Hash the password for security
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
require './Core/connection.php';



$hostname = $_ENV['HOSTNAME1'];
$dbname = $_ENV['DBNAME1'];
$username = $_ENV['USERNAME1'];
$password = $_ENV['PASSWORD1'];

try {
    // Create a database instance
    $users = new MakeConnection($hostname, $dbname, $username, $password);

    // Define SQL query
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    // Define parameters
    $params = [":email" => $email, ":password" => $hashedPassword];



      $users->query($sql, $params);

    echo "Data inserted successfully!";
  } catch (Exception $e) {

    echo "Error: " . $e->getMessage();
}


}

?>

