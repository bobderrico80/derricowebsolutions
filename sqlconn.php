<?php
//MySQL connection variables
$hostname = 'localhost';
$user = 'dwsadmin';
$pw = 'adminpw';
$database = 'dws';

//Connect to database
try {
    $db = new PDO('mysql:host=' . $hostname . ';dbname=' . $database,$user,$pw);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
