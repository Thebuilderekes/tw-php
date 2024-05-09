<?php

$config = parse_ini_file(__DIR__ . "/config.ini", true);

$hostname = $config['database']['hostname'];
$dbname = $config['database']['dbname'];
$username = $config['database']['username'];
$password = $config['database']['password'];

// Get the form data from POST request
$name = $_POST["name"];
$plainPassword = $_POST["password"];

// Hash the password for security
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

require 'Database.php';


// Usage example (assuming you have a valid .env file)
$form_data_db = new Database($hostname, $dbname, $username, $password);
$sql = "INSERT INTO user_form_data (name, password) VALUES (:name, :password)";
$params = [":name" => $name, ":password"=> $hashedPassword];
$form_data_db->query($sql, $params);

