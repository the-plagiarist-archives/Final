<?php
require_once 'signup/config.php';
require_once 'signup/signup.view.php';
require_once 'signup/loginview.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SIGNUP FORM</h1>
    <form action="signup/sign.php" method="post">
        <?php
        signup_inputs();
        ?>
        <button>Submit</button>

    </form>
    <?php
    check_errors();

    ?>
    <h3>
        <?php
        output_username();
        ?>
    </h3>

    <?php
    if(!isset($_SESSION["user_id"])){ ?>
    <h1>LOGIN FORM</h1>
    <form action="signup/login.s.php" method="post">
        <input type="text" name="customername" placeholder="Enter Username">
        <br>
        <input type="password" name="pwd" placeholder="Enter password">
        <br>
        <button>Login</button>

    </form>

    <?php } ?>



    
    <?php
    check_login_errors();

    ?>

    <h1>LOGOUT</h1>
    <form action="signup/logout.s.php" method="post">
        
        <button>Logout</button>

    </form>

    
</body>
</html>