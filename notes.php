<?php
$heading = "Notes page";
require "Database.php";

$hostname = $_ENV['HOSTNAME2'];
$dbname = $_ENV['DBNAME2'];
$username = $_ENV['USERNAME2'];
$password = $_ENV['PASSWORD2'];

$user_db = new Database($hostname, $dbname, $username, $password);
$users= $user_db->fetchItems('select * FROM user WHERE id=1')->fetchAll(PDO::FETCH_ASSOC);


$notes_db = new Database($hostname, $dbname, $username, $password);
$notes= $notes_db->fetchItems('select * FROM notes')->fetchAll(PDO::FETCH_ASSOC);

require("./views/notes.view.php");
