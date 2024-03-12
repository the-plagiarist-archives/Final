<?php
require_once 'site/configsession.php';
require_once 'site/bview.php';

// Database connection details (replace with your credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = "finaldb";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to fetch staff names
$sql = "SELECT staffname FROM staffs";
$result = $conn->query($sql);

// Array to store staff names
$staffNames = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $staffNames[] = $row['staffname'];
  }
}

// Close connection
$conn->close();


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
            <option value="shave">Shave</option>
            <option value="ht">Haircut and Beard trim</option>
            <option value="hs">Haircut and Shave</option>
            <option value="kid">Kid's Haircut</option>

        
        </select>
        <br>
        <select name="barber" class="dropdown">
            <option value="select" disabled selected value>Select Barber</option>
        <?php foreach ($staffNames as $staffName) : ?>
                <option value="$staffName"><?php echo $staffName; ?></option>
                
                <?php endforeach; ?>

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