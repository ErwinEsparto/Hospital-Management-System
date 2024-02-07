<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/report.css">
    <title>Report</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#">Healthcare</a>
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

            <div class="main">
                <header> Record</header>
    
                <form action="#">
                    <div class="form-first">
                        <div class="details personal">
                            <span class="title"> Personal Details</span>
                            
                            <div class="fields">
                                <div class="input-field">
                                    <label>Full Name</label>
                                    <span> Mekaila Mae Aguila</span>
                                </div>
                                
                                <div class="input-field">
                                    <label>Gender</label>
                                    <select id="gender" name="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                
                                <div class="input-field">
                                    <label>Age</label>
                                    <span>20</span>
                                </div>
                                
                                <div class="input-field">
                                    <label> Date of Birth</label>
                                    <input type="date" placeholder="Enter birth date"required>
                                </div>
                                
                                <div class="input-field">
                                    <label>Marital </label>
                                    <select id="marital" name="marital" required>
                                        <option value="single">Single</option>
                                        <option value="merried">Merried</option>
                                        <option value="separated">Separated</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                
                                <div class="input-field">
                                    <label>Nationality</label>
                                    <span>Filipino</span>
                                </div>

                                <div class="input-field">
                                    <label>Occupation</label>
                                    <span>housewife</span>
                                </div>
                                
                                <div class="input-field">
                                    <label>Email Address</label>
                                    <span>mekailamaea@gmail.com</span>
                                </div>
                                
                                <div class="input-field">
                                    <label>Phone Number</label>
                                    <span>0977-015-7114</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vitals">
                            <span class="title"> Vital Signs/ Measurements</span>
                            
                            <div class="fields">
                                <div class="input-field">
                                    <span> Temperature: 39.7°C</span>
                                    <span> Heart Rate: 86 per minute </span>
                                    <span> Blood Pressure: 120/80 mm Hg</span>
                                    <span> Height: 170 cm</span>
                                    <span> Weight: 60klg</span>
                                    <span> BMI: 24.9</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="Health">
                            <span class="title"> Health Issue/ Problem</span>
                            
                            <div class="fields">
                                <div class="input-field">
                                    <span> Headache</span>
                                    <span> Flu</span>
                                    <span> Breathing problem</span>
                                    <span> Loss of Appetite</span>
                                    <span> Confusion</span>
                                    <span> Achy muscles</span>
                                    <span> Rash</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="footer">
                <p>© Healthcare Management System 2024</p>
            </div>

            <script>
                // Optional: You can include a print button to trigger the print dialog
                document.write('<button onclick="window.print()">Print Report</button>');
            </script>
</body>
</html>
    
