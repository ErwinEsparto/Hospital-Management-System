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
        session_start();
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";
        $loggedIn = $_SESSION['loggedIn'] ?? false;

        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $fetcbdata = "SELECT * FROM tbl_inventory;";
        $result = mysqli_query($conn, $fetcbdata);

        if(isset($_POST["submit"])){
            $newItem = $_POST["newMedicalSupplies"];
            $newQuantity = $_POST["newQuantity"];
    
            $aquery = "INSERT INTO tbl_inventory values ('', '$newItem','$newQuantity')";
            $addquery = mysqli_query ($conn, $aquery);
            header("location:Inventory.php");
            die();
        }
        else if(isset($_GET['fld_itemID'])){
            $query = "DELETE FROM tbl_inventory WHERE fld_itemID = '$_GET[fld_itemID]'";
            $delete = mysqli_query ($conn, $query);
            header("location:Inventory.php");
            die();
        }
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
                            <a class="active" href="Inventory.php">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                    else {
                        echo '
                            <a href="appointment.php">Appointments</a>
                            <a href="#" onclick="alert(\'The records section is for doctors only.\');">Records</a>
                            <a class="active" href="#" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                }
                else{
                    echo '
                    <a href="#" onclick="alert(\'Please login first.\');">Appointments</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Records</a>
                    <a class="active" href="#" onclick="alert(\'Please login first.\');">Inventory</a>
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
                <?php
                    $rownum = mysqli_num_rows($result);

                    if($rownum>0){
                        while ($items = mysqli_fetch_assoc($result)){
                            echo "
                            <tr class='choice'>
                                <td>".$items['fld_itemID']."</td>
                                <td>".$items['fld_item']."</td>
                                <td>".$items['fld_quantity']."</td>
                                <td>
                                    <a href='EditInventory.php?fld_itemID=".$items['fld_itemID']."'> Edit </a> |
                                    <a href='Inventory.php?fld_itemID=".$items['fld_itemID']."'> Delete </a>
                                </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <form method="POST">
                <label for="newMedicalSupplies">New Medical Supplies:</label>
                <input type="text" name="newMedicalSupplies" required>
                <label for="newQuantity">New Quantity:</label>
                <input type="text" name="newQuantity" required>
                <input type="submit" name="submit" value="Add">
            </form>
        </section>
    </div>

    <div class="footer">
        <p>© Healthcare Management System 2024</p>
    </div>
</body>
</html>
