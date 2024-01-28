<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="../css/appointment2.css" />
    
</head>
<body>

    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
            <div class="nav">
                <a href="Home.php">Home</a>
                <a class="active" href="appointment.php">Appointments</a>
                <a href="PatientRecords.php">Records</a>
                <a href="Inventory.php">Inventory</a>
                <a href="ContactingHospital.php">About Us</a>
            </div>
            <div class="account">
                <a class="active" href="#">Login</a>
            </div>
        </div>
        

         <!-- Appontment Form Section -->
         
<div class="appointment-section">
    <div class="blurred-background"></div> 
    <div class="appointment-container">
        <h1>Book an Appointment</h1>
        <form action="Home.php" method="post">
            <div>
                <label for="doctor">Choose a Doctor:</label>
                <select id="doctor" name="doctor">
                    <option value="doctor1">Choose doctor</option>
                    <option value="doctor2">Henry Sy</option>
                    <option value="doctor3">Kuya Will</option>
                    <option value="doctor4">Kuya J</option>
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
            <button type="submit">Save</button>
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $doctor = htmlspecialchars($_POST['doctor']);
            $date = htmlspecialchars($_POST['date']);
            $time = htmlspecialchars($_POST['time']);
            
            // echo "Appointment booked successfully for Dr. $doctor on $date at $time.";
        }
        ?>
    </div>
</div>
       


        <div class="footer">
            <p>© PUP Biñan Doctors 2024</p>
        </div>
    </div>
</body>
</html>
