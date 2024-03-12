<?php

declare(strict_types=1);

function signup_inputs(){
    

    if(isset($_SESSION["signup_data"]["customername"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo '<input type="text" name="customername" placeholder="Enter your username" value ="' . $_SESSION["signup_data"] ["customername"]. ' ">
        <br>';
    } else{
        echo '<input type="text" name="customername" placeholder="Enter your username">
        <br>';
    }


    echo '<input type="text" name="phonenum" placeholder="Enter your phone number">
    <br>';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_registered"]) && !isset($_SESSION["error_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="Enter your email" value ="' . $_SESSION["signup_data"] ["email"]. ' ">
        <br>';
    } else{
        echo '<input type="text" name="email" placeholder="Enter your email">
        <br>';
    }

    echo '<input type="password" name="pwd" placeholder="Enter your password">
    <br>';
}

function check_errors()
{
    if(isset($_SESSION['error_signup'])){
        $errors = $_SESSION['error_signup'];

        echo "<br>";

        foreach($errors as $error){

            echo '<p>' . $error . '</p>';

        }
        unset($_SESSION['error_signup']);

    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p>Signup success!</p>';

    }
    
   
}