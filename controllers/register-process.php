<?php

 require_once "../Core/Validator.php";
 require_once "../Core/connection.php";
$heading = "Register page";



$hostname = $_ENV['HOSTNAME1'];
$dbname = $_ENV['DBNAME1'];
$username = $_ENV['USERNAME1'];
$password = $_ENV['PASSWORD1'];

    $error['form_error'] = "";
$users= new MakeConnection($hostname, $dbname, $username, $password);

$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users(email, password) VALUES (:email, :password)";
// $validator object is used from Validator class give a reusable method string check on any input that needs to be checked
$validator = new Validator_();

  //$emailCheckParams = [":email" => $email];
//$checkEmailSql = "SELECT COUNT(*) AS email_count FROM users WHERE email = ?";
//submit form input to users table
if($_SERVER['REQUEST_METHOD'] === "POST"){

    //$result = $users->checkInput($emailCheckParams, $checkEmailSql);

// Check if the email is valid and if email already exists in the database
  if ($validator->isValidEmail($_POST['email'])){

    $userparams = [":email" => $email, ":password"=> $hashedPassword ];



    $users->query($sql, $userparams);



    $error['form_error'] = "Your account has been created, you can now login!";
  } else if (!$validator->isValidEmail($_POST['email'])) {

        $error['form_error'] = "Please enter a valid email address.";

  } else {

        $error['form_error'] = "An account with this email has already been created.";
  }

}



