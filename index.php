<?php
 set_include_path( $_SERVER['DOCUMENT_ROOT'] . '/' );

$heading = "Home page";

$home = __DIR__;

echo $home;
require("views/index.view.php");
