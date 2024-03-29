<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="../css/profile-style.css">
</head>
<body>
    <?php
        session_start();
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";
        $loggedIn = $_SESSION['loggedIn'] ?? false;

        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $fetcbdata = "SELECT * FROM tbl_users WHERE fld_userID='".$_GET['fld_userID']."'";
        $result = mysqli_query($conn, $fetcbdata);
        $account = mysqli_fetch_assoc($result);

        $getPrescription = "SELECT
            patient.fld_userName as patientName,
            doctor.fld_userName as doctorName,
            tbl_prescription.fld_prescription,
            tbl_prescription.fld_prescriptionDate,
            tbl_prescription.fld_prescriptionAmt,
            tbl_prescription.fld_prescriptionAmt,
            tbl_prescription.fld_frequency
            FROM tbl_prescription
            JOIN tbl_users patient ON tbl_prescription.fld_userID = patient.fld_userId
            JOIN tbl_users doctor ON tbl_prescription.fld_doctorID = doctor.fld_userId
            WHERE patient.fld_userID='".$_GET['fld_userID']."'";
        $prescriptionResult = mysqli_query($conn, $getPrescription);

        $getDoctor = ""
    ?>

    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>
    </div>

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="../images/profile.png" alt="" width="100" height="100">

            <div class="name">
                <?php echo $account['fld_userName']; ?>
            </div>
            <div class="job">
                <?php 
                    if($account['fld_groupID']==1){
                        echo "Healthcare Professional"; 
                    }
                    else {
                        echo "Patient"; 
                    }
                ?>
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Settings</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="home.php">Back</a>
                <hr align="center">
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="main-profile">
        <h2>Personal Info</h2>
        <div class="card">
            <div class="card-body">
                <table class="presc">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $account['fld_userName']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $account['fld_email']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $account['fld_address']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $account['fld_phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>:</td>
                            <td><?php echo $account['fld_birth']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $account['fld_gender']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2>Prescription</h2>
        <div class="secondCard">
            <div class="card-body">
                <center>
                <?php
                    if($account['fld_groupID']==2){
                        $rownum = mysqli_num_rows($prescriptionResult);

                        if($rownum>0){
                                echo '
                                <table class="prescriptions">
                                    <thead>
                                        <tr class="category">
                                            <th>Doctor</th>
                                            <th>Prescription</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Frequency</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            while ($prescription = mysqli_fetch_assoc($prescriptionResult)){
                                echo "
                                    <tr>
                                        <td>".$prescription['doctorName']."</td>
                                        <td>".$prescription['fld_prescription']."</td>
                                        <td>".$prescription['fld_prescriptionDate']."</td>
                                        <td>".$prescription['fld_prescriptionAmt']."</td>
                                        <td>".$prescription['fld_frequency']."</td>
                                    </tr>";
                            }
                        }
                    }
                    else {
                        echo '<a href="PatientPrescription.php"> Provide Prescriptions to Patients </a>';
                    }
                    
                    ?>
                    </tbody>
                </table>
                </center>
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>