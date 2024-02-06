<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="../css/appointment2.css" />
    
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

        $fetchDoctors = "SELECT * FROM tbl_users WHERE fld_groupId=1";
        $doctors = mysqli_query($conn, $fetchDoctors);
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
                                <a class="active" href="#" onclick="alert(\'The appointment section is for patients only.\');">Appointments</a>
                                <a href="PatientRecords.php">Records</a>
                                <a href="Inventory.php">Inventory</a>
                                <a href="ContactingHospital.php">About Us</a>
                            ';
                        }
                        else {
                            echo '
                                <a class="active" href="appointment.php">Appointments</a>
                                <a href="#" onclick="alert(\'The records section is for doctors only.\');">Records</a>
                                <a href="#" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                                <a href="ContactingHospital.php">About Us</a>
                            ';
                        }
                    }
                    else{
                        echo '
                        <a class="active" href="#" onclick="alert(\'Please login first.\');">Appointments</a>
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
                        echo '
                            <a class="active" href="#">Profile</a>
                            <a href="logout.php">Logout</a>
                        ';
                    }
                    else {
                        echo '<a class="active" href="login.php">Login</a>';
                    }
                ?>
            </div>
        </div>
        

         <!-- Appontment Form Section -->
         
<div class="appointment-section">
    <div class="blurred-background"></div> 
    <div class="appointment-container">
        <h1>Book an Appointment</h1>
        <form method="POST">
            <div>
                <label for="doctor">Choose a Doctor:</label>
                <select id="doctor" name="doctor">
                    <?php
                        while ($row = $doctors->fetch_assoc()) {
                            echo "<option value='".$row['fld_userID']."'>".$row['fld_userName']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div>
                <label for="time">Select Time:</label>
                <input type="time" id="time" name="time">
            </div>
            <button type="submit" name="submit">Appoint</button>
            <?php
                if(isset($_POST["submit"])){
                    $userId = $_SESSION['userid'];
                    $doctor = $_POST["doctor"];
                    $date = $_POST["date"];
                    $time = $_POST["time"];

                    $appointmentQuery = "INSERT INTO tbl_appointment (fld_appointmentDate, fld_appointmentTime, fld_userID	, fld_doctorID) VALUES
                    ('$date', '$time', '$userId', '$doctor')";
                    $addAppointment = mysqli_query($conn, $appointmentQuery);

                    echo "<p id='result'> Successful Appointment. </p>";
                }
            ?>
        </form>
    </div>
</div>
       


        <div class="footer">
            <p>© PUP Biñan Doctors 2024</p>
        </div>
    </div>
</body>
</html>
