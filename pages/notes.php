<?php
require "../Validator.php";

$heading = "Notes page";
<<<<<<< HEAD:pages/notes.php
require "../Database.php";
=======

$name = htmlspecialchars($_POST['username']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$hostname = $_ENV['HOSTNAME2'];
$dbname = $_ENV['DBNAME2'];
$username = $_ENV['USERNAME2'];
$password = $_ENV['PASSWORD2'];

$user_db = new Database($hostname, $dbname, $username, $password);
$userparams = [":name" => $name, ":email"=> $email];

// $validator object is used from Validator class give a reusable method string check on any input that needs to be checked
$validator = new Validator();
//submit form input to notes table

//submit form input to notes table
if(isset( $_POST['username']) &&  isset($_POST['email'])){
    $name = $_POST['username'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO user (name, email) VALUES ( :name, :email)";
    $userparams = [":name" => $name, ":email"=> $email];
     $validator = new Validator();
}
if($_SERVER['REQUEST_METHOD'] === "POST"){


  if ($validator->string($_POST['username'])){
    $user_db->query($sql, $userparams);

    $error['form_error'] = "Your details have been submitted!";

  }else{
    $error['form_error'] = "Please fill out any empty field";
  }

}

$users= $user_db->fetchItems('select * FROM user')->fetchAll(PDO::FETCH_ASSOC);
 $check = "notes.php connection";
require("../views/notes.view.php");
