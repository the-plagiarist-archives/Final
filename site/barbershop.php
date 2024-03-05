<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $contactnum = $_POST["contactnum"];
    $service = $_POST["service"];
    $barber = $_POST["barber"];
    $adate = $_POST["adate"];
    $atime = $_POST["atime"];
    $amessage = $_POST["amessage"];

    try{
        require_once 'dbh.php';

    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }

}
else{
    header("Location: ../index.php");
    die();

}