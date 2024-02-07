<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	

    <title>Prescription Generator</title>
    <link rel="stylesheet" href="../css/prescription.css"> 
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
        
        $fetchPatients = "SELECT * FROM tbl_users WHERE fld_groupId=2";
        $patients = mysqli_query($conn, $fetchPatients);
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
    </div>

    <div class="prescription-container">
        <h1 class="prescription-header">Prescription Form</h1>
        <form method="POST">
            <div class="patient-info">
                <label for="patient">Choose a Patient:</label>
                <select id="patient" name="patient">
                    <?php
                        while ($row = $patients->fetch_assoc()) {
                            echo "<option value='".$row['fld_userID']."'>".$row['fld_userName']."</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="medicine-info">
                <label for="medicinename">Medicine Name:</label>
                <input type="text" name="medicinename">
                <br>
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" required>

                <select name="unit">
                    <option value="mg">mg</option>
                    <option value="ml">ml</option>
                    <option value="tsp">tsp</option>
                    <option value="tbsp">tbsp</option>
                </select>
                <br>
                <label for="frequency">Frequency:</label>
                <input type="text" id="frequency" name="frequency">
                
            </div>
            <button class="generate-button" name="submit" >Prescribe</button>
        </form>
        <?php
            if(isset($_POST["submit"])){
                $userId = $_SESSION['userid'];
                $patient = $_POST["patient"];
                $date = $_POST["date"];
                $medicineName = $_POST["medicinename"];
                $amount = $_POST["amount"];
                $unit = $_POST["unit"];
                $amountUnit = $amount . " " . $unit;
                $frequency = $_POST["frequency"];

                $prescriptionQuery = "INSERT INTO tbl_prescription (fld_prescription, fld_prescriptionDate, fld_prescriptionAmt, fld_frequency, fld_userID, fld_doctorID) VALUES
                ('$medicineName', '$date', '$amountUnit', '$frequency', '$patient', '$userId')";
                $addPrescription = mysqli_query($conn, $prescriptionQuery);

                echo "<p id='result'> Prescribed Successfully. </p>";
            }
        ?>
    </div>
            
  <div class="footer">
            <p>© Healthcare Management System 2024</p>
        </div>
    </div>
</body>
</html>
