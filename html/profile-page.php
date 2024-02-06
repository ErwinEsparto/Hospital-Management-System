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
            <img src="https://scontent.fmnl4-4.fna.fbcdn.net/v/t1.6435-9/84119388_1211680262354975_8124552135036633088_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=7a1959&_nc_eui2=AeEz0iRwM6nhXTNOCJe2QvFQZpdVV9GbAHNml1VX0ZsAcxnEaTKn_omXysxOheeUZ-xMgpW2YDsd8w3TtqcV2pH3&_nc_ohc=vDZzPSHOLzYAX9HUW_r&_nc_ht=scontent.fmnl4-4.fna&oh=00_AfCvtoM9tIwG3d2kRD-j9lGm3CXTkghoGVjyD266OgG4vQ&oe=65ACBE49" alt="" width="100" height="100">

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
                <table>
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
                    <tbody>
                    <?php
                        $rownum = mysqli_num_rows($prescriptionResult);

                        if($rownum>0){
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