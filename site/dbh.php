<?php

$host = 'localhost';
$dbname = 'finaldb';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$hosty;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
    die("Connection failed". $e->getMessage());
 }

