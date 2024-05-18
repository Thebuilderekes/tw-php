<?php
$heading = "Notes page";


  $name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
require "./Database.php";

$hostname = $_ENV['HOSTNAME2'];
$dbname = $_ENV['DBNAME2'];
$username = $_ENV['USERNAME2'];
$password = $_ENV['PASSWORD2'];

$user_db = new Database($hostname, $dbname, $username, $password);
$sql = "INSERT INTO user (name, email) VALUES ( :name, :email)";
$userparams = [":name" => $name, ":email"=> $email];

//submit form input to notes table

if($_SERVER['REQUEST_METHOD'] === "POST"){

if (strlen($_POST['username'] > 0 ) || strlen($_POST['email']) > 0) {
    $user_db->query($sql, $userparams);

    $error['form_error'] = "Your email has been submitted!";
}else{
    $error['form_error'] = "please fill out any empty field";
}
}


$users= $user_db->fetchItems('select * FROM user')->fetchAll(PDO::FETCH_ASSOC);
 $check = "notes.php connection";
require("./views/notes.view.php");
