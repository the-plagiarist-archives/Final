<?php
// Database connection details (replace with your credentials)
$host = 'finaldb';
$username = 'root';
$password = '';
$dbname = "finaldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="body-appointment.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Appointments</title>
  </head>
  <body>
    <div class="container-main">
      <div class="container-sidebar">
        <div class="container-logo">
          <img class="sidebar-logo" src="img/tweed-logo-large.png" />
        </div>
        <div class="sidebar-items">
          <button onclick="showContent('appointments')">Appointments</button>
          <button onclick="showContent('schedule')">Schedule</button>
        </div>
        <div class="container-account">
          <p>Allen Rojo</p>
          <p>allenrojo31@gmail.com</p>
        </div>
      </div>
      <div id="appointments" class="content">
        <h1>Select Services</h1>
        <div class="container-services">
          <form action="site/barbershop.php" method="post">
          <div class="services">
          <input type="text" name="fullname" placeholder="Name">
          <br>
          <input type="text" name="email" placeholder="Email">
          <br>
          <input type="text" name="contactnum" placeholder="Enter your contact number">
          <br>
            <p>Haircut</p>
            <div class="dropdown" name="service">
              <div class="select">
                <span class="selected">Choose staff</span>
                <div class="caret"></div>
              </div>
              <ul class="menu" name="barber">
                <?php foreach ($staffNames as $staffName) : ?>
                <li class="active"><?php echo $staffName; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <button onclick="">
              <i class="bx bx-plus"></i>
            </button>
            <input type="date" name="adate" >
            <br>
            <input type="text" name="atime" placeholder="Input your time">
          <br>

          <textarea name="amessage" placeholder="Enter your message" cols="30" rows="10"></textarea>
        <br>
          </div>
          <div class="services">
            <p>Beard Trim</p>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Choose staff</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li class="active">Any staff</li>
                  <li>Clark</li>
                  <li>Xylgei</li>
                  <li>Joshua</li>
                </ul>
              </div>
            <button>
              <i class="bx bx-plus"></i>
            </button>
          </div>
          <div class="services">
            <p>Haircut + Beard Trim</p>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Choose staff</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li class="active">Any staff</li>
                  <li>Clark</li>
                  <li>Xylgei</li>
                  <li>Joshua</li>
                </ul>
              </div>
            <button>
              <i class="bx bx-plus"></i>
            </button>
          </div>
          <div class="services">
            <p>Shave</p>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Choose staff</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li class="active">Any staff</li>
                  <li>Clark</li>
                  <li>Xylgei</li>
                  <li>Joshua</li>
                </ul>
              </div>
            <button>
              <i class="bx bx-plus"></i>
            </button>
          </div>
          <div class="services">
            <p>Haircut + Shave</p>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Choose staff</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li class="active">Any staff</li>
                  <li>Clark</li>
                  <li>Xylgei</li>
                  <li>Joshua</li>
                </ul>
              </div>
            <button>
              <i class="bx bx-plus"></i>
            </button>
          </div>
          <div class="services">
            <p>Kid's Haircut</p>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Choose staff</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li class="active">Any staff</li>
                  <li>Clark</li>
                  <li>Xylgei</li>
                  <li>Joshua</li>
                </ul>
              </div>
            <button>
              <i class="bx bx-plus"></i>
            </button>
          </div>

          </form>
          
        </div>
        <h1>Your Appointment</h1>
        <div class="container-yourappointment"></div>
        <h1>Date and Time</h1>
        <div class="dateandtime"></div>
      </div>
      <div id="schedule" class="content" style="display: none">content</div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
