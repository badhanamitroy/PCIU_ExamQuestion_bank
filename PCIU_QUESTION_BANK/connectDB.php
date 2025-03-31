<?php

// Connecting to the database
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'pciu_question_bank';
$connection = mysqli_connect($server, $user, $pass, $db);

if(!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
