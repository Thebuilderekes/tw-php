<?php


function display($item){

echo "<pre>";

var_dump($item);

echo "</pre>";

}

function loadNotFoundPage() {
    // Check if the requested URL does not exist
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
        // Load the "page not found" content
        include('./404.php'); // Change '404.html' to the path of your "page not found" file
        exit(); // Stop further execution
    }
}

// Call the function