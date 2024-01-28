<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Records</title>
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
        .logo a, .nav a {
            color: white;
            text-decoration: none;
            padding: 20px;
            margin: 5px;
        }
        .nav a:hover {
            color: white;
            border: solid 1px white;
        }
        .nav .active {
            color: #A1DBF1;
            pointer-events: none;
        }
        .appointments {
            margin-top: 80px;
            width: 90%;
            height: 600px;
            box-shadow: 0px 0px 10px gray;
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
        .choice:hover {
            background-color: #F4F9F4;
            cursor: pointer;
        }
        .footer {
            background-image: linear-gradient(to bottom, rgba(0, 0,0 ,0), rgba(0, 0, 0, 0.2));
            display: flex;
            justify-content: space-around;
            padding: 20px;
            bottom: 0;
            width: 100%;
            position: fixed;
        }
    </style>
</head>
<body>
    <?php
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";

        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $fetcbdata = "SELECT * FROM tbl_users";
        $result = mysqli_query($conn, $fetcbdata);
    ?>

    <div class="container">

        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
            <div class="nav">
                <a href="Home.html">Home</a>
                <a href="#">Prescriptions</a>
                <a href="#">Appointments</a>
                <a class="active" href="#">Records</a>
                <a href="#">Inventory</a>
                <a href="#">Contact</a>
            </div>
        </div>

        <div class="main">
            <div class="content">
                <center>
                <table class="appointments">
                    <tr class="tabs">
                        <th class="inactivetab" colspan="2" onclick="window.location='../html/PatientRecords.php';">Patients</th>
                        <th class="activetab" colspan="2">Appointments</th>
                    </tr>
                    <tr>
                        <td>Patient Name</td>
                        <td>Date</td>
                        <td>Contact Number</td>
                        <td>Concern</td>
                    </tr>
                    
                    <?php foreach($result as $row): ?>
                        <tr class="choice">
                            <td><?= htmlspecialchars($row['fld_userName']) ?></td>
                            <td><?= htmlspecialchars($row['fld_gender']) ?></td>
                            <td><?= htmlspecialchars($row['fld_address']) ?></td>
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