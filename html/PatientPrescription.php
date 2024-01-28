<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	

    <title>Prescription Generator</title>
    <link rel="stylesheet" href="../css/prescription.css"> 
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
            <div class="nav">
                <a href="Home.php">Home</a>
                <a href="appointment.php">Appointments</a>
                <a href="PatientRecords.php">Records</a>
                <a href="Inventory.php">Inventory</a>
                <a href="ContactingHospital.php">About Us</a>
            </div>
            <div class="account">
                <a class="active" href="#">Login</a>
            </div>
        </div>
    </div>

    <div class="prescription-container">
        <h1 class="prescription-header">Prescription Form</h1>
        <div class="patient-info">
            <label for="patient-name">Patient Name:</label>
            <input type="text" id="patient-name" name="patient-name">
            <br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
        </div>
        <div class="medicine-info">
            <label for="medicine-name">Medicine Name:</label>
            <input type="text" id="medicine-name" name="medicine-name">
            <br>
			
			 <label for="amount">Amount:</label>
                <input type="number" id="amount" required>

                <select id="unit-select">
                    <option value="mg">mg</option>
                    <option value="ml">ml</option>
                    <option value="tsp">tsp</option>
                    <option value="tbsp">tbsp</option>
                </select>
            <br>
            <label for="frequency">Frequency:</label>
            <input type="text" id="frequency" name="frequency">
			
        </div>
        <button class="generate-button">Prescribe</button>
       
                    </div>
                    
                </div>
                
            </div>
            
  <div class="footer">
            <p>© Healthcare Management System 2024</p>
        </div>
    </div>
</body>
</html>
