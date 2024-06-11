<?php
$heading = "Register page";

require "../Core/Validator.php";
 require "../Core/connection.php";
$heading = "note page";
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
$validator = new Validator();

$checkEmailSql = "SELECT COUNT(*) AS email_count FROM users WHERE email = ?";
//submit form input to users table
if($_SERVER['REQUEST_METHOD'] === "POST"){

    // check i 
    $result = $users->checkInput($email, $checkEmailSql);

// Check if the email is valid and if email already exists in the database
  if ($validator->isValidEmail($_POST['email']) && $result['email_count'] === 0){

    $userparams = [":email" => $email, ":password"=> $hashedPassword ];

    $users->query($sql, $userparams);

    $_SESSION['user'] = [
      'email' => $email
    ];

    $error['form_error'] = "Your details have been submitted!";
    header("Location: ../public/index.php");
 exit();

} else if (!$validator->isValidEmail($_POST['email'])) {
    $error['form_error'] = "Please enter a valid email address.";
  } else {
    $error['form_error'] = "An account with this email has already been created.";
  }

}

$usernames= $users->fetchItems('select * FROM users')->fetchAll(PDO::FETCH_ASSOC);
$check = "register.php connection";

echo $check;

require("../views/register.view.php");
