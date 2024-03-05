<?php
require_once 'site/configsession.php';
require_once 'site/bview.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="site/barbershop.php" method="post">
        <h1>Barbershop Appointment</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <br>
        <input type="text" name="fullname" placeholder="Name">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="contactnum" placeholder="Enter your contact number">
        <br>
        <select class="dropdown" name="aservice">
            <option value="select" disabled selected value>Select services</option>
            <option value="haircut">Haircut</option>
            <option value="trim">Beard trim</option>
            <option value="ht">Haircut and Beard trim</option>

        
        </select>
        <br>
        <select name="barber" class="dropdown">
            <option value="select" disabled selected value>Choose your Barber</option>
            <option value="Xylgei">Xylgei</option>
            <option value="Pete">Pete</option>
            <option value="Allen">Allen</option>

        </select>
        <br>
        <input type="date" name="adate" >
        <br>
        <input type="text" name="atime" placeholder="Input your time">
        <br>

        <textarea name="amessage" placeholder="Enter your message" cols="30" rows="10"></textarea>
        <br>
        <button>Make your Appointment</button>


    </form>
    <?php
    check_errors();

    ?>
    
</body>
</html>