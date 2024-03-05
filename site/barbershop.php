<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $contactnum = $_POST["contactnum"];
    $aservice = $_POST["aservice"];
    $barber = $_POST["barber"];
    $adate = $_POST["adate"];
    $atime = $_POST["atime"];
    $amessage = $_POST["amessage"];

    try{
        require_once 'dbh.php';
        require_once 'bmodel.php';
        require_once 'bcontr.php';
        

        $errors = [];
        

        if(is_input_empty($fullname, $email, $contactnum, $aservice, $barber, $adate, $atime, $amessage)){
            $errors["empty_input"] = "Fill in all fields!";

        }
        if(email_invalid($email)){
        $errors["invalid_email"] = "Invalid email!";

        }
        require_once 'configsession.php';

        if($errors){
            $_SESSION["errors_barbershop"] = $errors;
            header("Location: ../index.php");
            die();
        }
       create_appointment($pdo, $fullname, $email, $contactnum, $aservice, $barber, $adate, $atime, $amessage);

       header("Location: ../index.php?success");

       $pdo = null;
       $stmt = null;
       die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }

}
else{
    header("Location: ../index.php");
    die();

}