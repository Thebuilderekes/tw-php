<?php
$heading = "Register page";

require "../Core/Validator.php";
 require "../Core/connection.php";
$heading = "note page";
$hostname = $_ENV['HOSTNAME1'];
$dbname = $_ENV['DBNAME1'];
$username = $_ENV['USERNAME1'];
$password = $_ENV['PASSWORD1'];

$users= new MakeConnection($hostname, $dbname, $username, $password);
$sql = "INSERT INTO users(email, password) VALUES (:email, :password)";
// $validator object is used from Validator class give a reusable method string check on any input that needs to be checked
$validator = new Validator();

//submit form input to users table
if($_SERVER['REQUEST_METHOD'] === "POST"){

 

$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = htmlspecialchars($_POST['password']);

  if ($validator->isValidEmail($_POST['email'])){

    $userparams = [":email" => $email, ":password"=> $password ];
    $users->query($sql, $userparams);

    $error['form_error'] = "Your details have been submitted!";

  }else{
    $error['form_error'] = "Please fill out any empty field";
  }

}

$usernames= $users->fetchItems('select * FROM users')->fetchAll(PDO::FETCH_ASSOC);
$check = "register.php connection";

echo $check;
// var_dump($notes_record);

require("../views/register.view.php");
