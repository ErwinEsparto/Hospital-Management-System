<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Inventory.css">
    <title>Inventory</title>
</head>

<body>
    <?php
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";

        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $fetcbdata = "SELECT * FROM tbl_inventory;";
        $result = mysqli_query($conn, $fetcbdata);
    ?>

    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
        
            <div class="nav">
                <a href="Home.php">Home</a>
                <a href="appointment.php">Appointments</a>
                <a href="PatientRecords.php">Records</a>
                <a class="active" href="Inventory.php">Inventory</a>
                <a href="ContactingHospital.php">About Us</a>
            </div>
			
			 <div class="account">
                <a class="active" href="#">Login</a>
            </div>
        </div>

        <section id="content">
            <center>
            <table class="inventory">
                <thead>
                    <tr class="category">
                        <th>ID NO.</th>
                        <th>Medical Supplies</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $row): ?>
                        <tr class="choice">
                            <td><?= htmlspecialchars($row['fld_itemID']) ?></td>
                            <td><?= htmlspecialchars($row['fld_item']) ?></td>
                            <td><?= htmlspecialchars($row['fld_quantity']) ?></td>
                            <td><a href='edit.php?id=1'>Edit</a> | <a href='delete.php?id=1'>Delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <form action="add.php" method="post">
                <label for="newMedicalSupplies">New Medical Supplies:</label>
                <input type="text" name="newMedicalSupplies" required>
                <label for="newQuantity">New Quantity:</label>
                <input type="text" name="newQuantity" required>
                <input type="submit" value="Add">
            </form>
        </section>
    </div>

    <div class="footer">
        <p>© Healthcare Management System 2024</p>
    </div>
</body>
</html>
