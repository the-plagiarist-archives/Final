<?php
session_start();
include('dbh.pr.php');


$host = 'localhost';
$dbname = 'appointmentsystem';
$dbusername = 'root';
$dbpassword = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
  die("Connection failed". $e->getMessage());
}

$fetchSql = "SELECT id, servicetype FROM service";
$insertSql = "INSERT INTO appointment (customer_id, service_id, barber_id, adate) VALUES (:customer_id, :servicetype , :barbername, :adate)"; // Adjust insert query

// Fetch data for select tag
$fetchStmt = $pdo->prepare($fetchSql);
$fetchStmt->execute();
$results = $fetchStmt->fetchAll(PDO::FETCH_ASSOC);

$fetchSql1 = "SELECT id, barbername FROM barber";// Adjust insert query

// Fetch data for select tag
$fetchStmt1 = $pdo->prepare($fetchSql1);
$fetchStmt1->execute();
$results1 = $fetchStmt1->fetchAll(PDO::FETCH_ASSOC);


if (!$results) {
  echo "No data found for select tag.";
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <script>
    $(document).ready(function() {
      $("#submit").click(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get selected values
        var customerName = $("#customername").val();
        var barberName = $("#barbername").val();
        var serviceType = $("#servicetype").val();
        var appointmentDate = $("#adate").val();
        <?php
        
        ?>

        // Create confirmation tab content
        var confirmationText = "<h2>Confirmation</h2><p>Customer Name: " + customerName + "</p><p>Barber Name: " + barberName + "</p><p>Service Type: " + serviceType + "</p><p>Appointment Date: " + appointmentDate + "</p>";

        // Display confirmation tab (replace with your desired method)
        $("#confirmationTab").html(confirmationText);
        $("#confirmationTab").show(); // Show the confirmation tab
        $("#confirmationTab").append("<button type='button' id='confirmSubmitBtn'>Confirm</button>");

        // Handle confirm button click
        $("#confirmSubmitBtn").click(function() {
          // Submit the form using AJAX
          $.ajax({
            url: "authorization.php", // Replace with your submit script
            type: "POST",
            data: {
              customername: customerName,
              barbername: barberName,
              servicetype: serviceType,
              adate: appointmentDate
            },
            success: function(response) {
              // Handle successful submission (e.g., display success message)
              console.log(response); // For debugging purposes
              // Reset the form
              $("#appointmentForm")[0].reset();
              $("#confirmationTab").hide();  // For debugging purposes
            },
            error: function(jqXHR, textStatus, errorThrown) {
              // Handle errors during submission
              console.error(textStatus, errorThrown); // For debugging purposes
            }
          });
        });

        // Optionally, add a confirmation button to submit the form
        // $("#confirmationTab").append("<button type='submit' name='confirmSubmit'>Confirm</button>");
      });
    });
  </script>
</head>
<body>
<h3>Welcome <?php echo "You are logged in as ". $_SESSION["user_customername"];


  
  ?>! </h3>

    <h1>Book an Appointment</h1>
    
    <form action="authorization.php" method="post" id="appointmentForm">
      <input type="hidden" name="customername" value="<?php echo $_SESSION["user_customername"];
      
     
  ?>" id="customername">
        
        <label for="service">Choose Type of service</label>
        <select name="servicetype" id="servicetype">
        <option value="select" disabled selected value>Select Services</option>


        <?php foreach ($results as $row) : ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['servicetype']; ?></option>
                
                <?php endforeach; ?>  

        </select>
        <br>
        <label for="barber">Choose barbers</label>
        <select name="barbername" id="barbername">
        <option value="select" disabled selected value>Select Barbers</option>
        <?php foreach ($results1 as $row1) : ?>
                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['barbername']; ?></option>
                
                <?php endforeach; ?>


        </select>
        <br>
        <input type="date" name="adate" placeholder="Choose date" id="adate">
        <br>
        <button id="submit">Submit</button>

        
    </form>
    <div id="confirmationTab" style="display: none;"> </div>

    <a href="../home.php">Return to home</a>


    

</body>
</html>
