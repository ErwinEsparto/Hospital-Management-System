<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("../images/background.png");
            font-family: 'Century Gothic';
            margin: 0;
        }
        .header {
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.4));
            display: flex;
            justify-content: space-around;
            padding: 40px;
        }
        .logo a, .nav a, .account a {
            color: white;
            text-decoration: none;
            padding: 20px;
            margin: 5px;
        }
        .nav a{
            border: solid 1px rgba(1, 1, 1, 0);
        }
        .nav a:hover {
            color: white;
            border: solid 1px white;
        }
        .nav .active {
            color: #A1DBF1;
            pointer-events: none;
        }
        .account a{
            padding: 10px 30px 10px 30px;
            border-radius: 20px;
        }
        .account .active {
            padding: 10px 30px 10px 30px;
            background-color: #71D5E4;
            color: black;
            border-radius: 20px;
        }
        .account a:hover{
            background-color: #00B6BC;
        }
        .patients {
            margin-top: 80px;
            width: 90%;
            height: 600px;
            box-shadow: 0px 0px 10px gray; - Patient Records
        }
        .activetab {
            background-color: rgb(113, 213, 228, .3); 
            pointer-events: none;
        }
        .inactivetab{
            background-color: rgb(0, 182, 188, .3);
        &:hover {
            background-color: #F4F9F4;
            cursor: pointer;
        }
        }
        th, tr {
            background-color: rgb(228, 244, 243, .5);
            padding: 20px;
            text-align: center;
        }
        td {
            width: 25%;
        }
        .address{
            font-size: 0.9em;
        }
        .choice:hover {
            background-color: #F4F9F4;
            cursor: pointer;
        }
        .footer {
            background-image: linear-gradient(to bottom, rgba(0, 0,0 ,0), rgba(0, 0, 0, 0.2));
            display: flex;
            justify-content: space-around;
            bottom: 0;
            width: 100%;
            position: fixed;
        }
    </style>
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
        $fetcbdata = "SELECT * FROM tbl_users WHERE fld_groupID = 2;";
        $result = mysqli_query($conn, $fetcbdata);
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
                            <a class="active" href="PatientRecords.php">Records</a>
                            <a href="Inventory.php">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                    else {
                        echo '
                            <a href="appointment.php">Appointments</a>
                            <a class="active" href="#" onclick="alert(\'The records section is for doctors only.\');">Records</a>
                            <a href="#" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                }
                else{
                    echo '
                    <a href="#" onclick="alert(\'Please login first.\');">Appointments</a>
                    <a class="active" href="#" onclick="alert(\'Please login first.\');">Records</a>
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

        <div class="main">
            <div class="content">
                <center>
                <table class="patients">
                    <tr class="tabs">
                        <th class="activetab" colspan="2">Patients</th>
                        <th class="inactivetab" colspan="2" onclick="window.location='AppointmentRecords.php';">Appointments</th>
                    </tr>
                    <tr>
                        <td class="activetab" colspan="4">Choose a patient name for further information</td>
                    </tr>
                    <tr class="category">
                        <td>Patient Name</td>
                        <td>Gender</td>
                        <td>Address</td>
                        <td>Contact Number</td>
                    </tr>

                    <?php foreach($result as $row): ?>
                        <tr class="choice">
                            <td><?= htmlspecialchars($row['fld_userName']) ?></td>
                            <td><?= htmlspecialchars($row['fld_gender']) ?></td>
                            <td class="address"><?= htmlspecialchars($row['fld_address']) ?></td>
                            <td><?= htmlspecialchars($row['fld_phone']) ?></td>
                        </tr>
                    <?php endforeach ?>

                </table>
                </center>
            </div>
        </div>

        <div class="footer">
            <p>© PUP Biñan Doctors 2024</p>
        </div>

    </div>
</body>
</html>