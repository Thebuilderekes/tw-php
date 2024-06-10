<?php
require "../Core/Validator.php";
 require "../Core/connection.php";
$heading = "note page";
$hostname = $_ENV['HOSTNAME2'];
$dbname = $_ENV['DBNAME2'];
$username = $_ENV['USERNAME2'];
$password = $_ENV['PASSWORD2'];

$notes_record = new MakeConnection($hostname, $dbname, $username, $password);
$sql = "INSERT INTO notes(message) VALUES (:message)";
// $validator object is used from Validator class give a reusable method string check on any input that needs to be checked
$validator = new Validator();

//submit form input to users table
if($_SERVER['REQUEST_METHOD'] === "POST"){


 $message = htmlspecialchars($_POST['message']);


  if ($validator->string($_POST['message'])){

    $notesparams = [":message" => $message];
    $notes_record->query($sql, $notesparams);

    $error['form_error'] = "Your details have been submitted!";

  }else{
    $error['form_error'] = "Please fill out any empty field";
  }

}

$notes= $notes_record->fetchItems('select * FROM notes')->fetchAll(PDO::FETCH_ASSOC);
$check = "notes.php connection";

echo $check;
// var_dump($notes_record);
require("../views/note.view.php");



