<?php
require('register-process.php');
$usernames= $users->fetchItems('select * FROM users')->fetchAll(PDO::FETCH_ASSOC);
