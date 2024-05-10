<?php


// Get the form data from POST request
$name = $_POST["name"];
$plainPassword = $_POST["password"];

// Hash the password for security
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

require 'Database.php';



$form_data_db = new Database($hostname, $dbname, $username, $password);
$sql = "INSERT INTO user_form_data (name, password) VALUES (:name, :password)";
$params = [":name" => $name, ":password"=> $hashedPassword];
$form_data_db->query($sql, $params);

