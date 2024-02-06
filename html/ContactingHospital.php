<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>PUP Biñan Doctors - Contact Us</title>
  <link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>
<body>
  <?php
        session_start();

        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";
        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $loggedIn = $_SESSION['loggedIn'] ?? false;
    ?>
  <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
            <div class="nav">
                <a href="Home.php">Home</a>
                <?php
                if ($loggedIn == true){
                    $userId = $_SESSION['userid'];
                    $getUserGroup = "SELECT * FROM tbl_users WHERE fld_userID=$userId";
                    $userGroupResult = mysqli_query($conn, $getUserGroup);
                    $userGroup = mysqli_fetch_assoc($userGroupResult);
                    $accountType = $userGroup['fld_groupID'];

                    if ($accountType==1){
                        echo '
                            <a href="#" onclick="alert(\'The appointment section is for patients only.\');">Appointments</a>
                            <a href="PatientRecords.php">Records</a>
                            <a href="Inventory.php">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                    else {
                        echo '
                            <a href="appointment.php">Appointments</a>
                            <a href="#" onclick="alert(\'The records section is for doctors only.\');">Records</a>
                            <a href="#" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                }
                else{
                    echo '
                    <a href="#" onclick="alert(\'Please login first.\');">Appointments</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Records</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Inventory</a>
                    <a href="ContactingHospital.php">About Us</a>
                ';
                }
            ?>
            </div>
            <div class="account">
                <?php
                    if ($loggedIn==true){
                      $userId = $_SESSION['userid'];
                      echo '
                          <a class="active" href="profile-page.php?fld_userID='.$userId.'">Profile</a>
                          <a href="logout.php">Logout</a>
                      ';
                    }
                    else {
                        echo '<a class="active" href="login.php">Login</a>';
                    }
                ?>
            </div>
        </div>
      

    <div class="headmap">
      <p>Map of PUP Biñan Doctors </p>
    </div>


    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.96372878783!2d121.0757624743127!3d14.313539686139432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d77dec99259b%3A0x85e6a0648bf24d87!2sPolytechnic%20University%20of%20the%20Philippines%20Bi%C3%B1an!5e0!3m2!1sen!2sph!4v1702920768312!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    </div>

    <div class="box">
        <div class="left">
          <div class="center">
            <div class="inside-center">
              Follow us at our official facebook page:
              <div class="social-links">
                 <p><normal>PUP Biñan Doctors<normal></p>
              </div>
            </div>
          </div>

          <div class="center right">
            <div class="inside-center">
              <div class="for-flex">
                Contact us with this mobile number:
                <a href=""><img src="call.png" alt=""></a>
                <p><normal>+639128803234</normal></p>
              </div>
            </div>
          </div>


          <div class="center">
            <div class="inside-center">
              Our hospital location:
              <p> 837H+C88, Biñan City, Laguna</p>
            </div>
          </div>
        </div>
    </div>
              
    <div class="footer">
      <p>© Healthcare Management System 2024</p>
    </div>
  </div>
</body>
</html>