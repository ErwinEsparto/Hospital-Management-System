<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/EditInventory.css">
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
        $fetchdata = "SELECT * FROM tbl_inventory WHERE fld_itemID='".$_GET['fld_itemID']."'";
        $result = mysqli_query($conn, $fetchdata);

        if(isset($_POST["submit"])){
            $itemID = $_POST["id"];
            $newName = $_POST["newName"];
            $newQuantity = $_POST["newQuantity"];
            mysqli_query($conn, "UPDATE tbl_inventory SET fld_item='$newName', fld_quantity='$newQuantity' WHERE fld_itemID='".$_GET['fld_itemID']."'");

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
                            <a href="#" class="active" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                }
                else{
                    echo '
                    <a href="#" onclick="alert(\'Please login first.\');">Appointments</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Records</a>
                    <a href="#" class="active" onclick="alert(\'Please login first.\');">Inventory</a>
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

        <section id="content">
            <center>
                <form method='POST'>
                    <?php $items = mysqli_fetch_assoc($result); ?>
                    <input type='hidden' name='id' value="<?php echo $items['fld_itemID']; ?>" required>

                    <table>
                        <tr> 
                            <th> <label for='newName'>Change Name</label> </th>
                            <th> <label for='newQuantity'>Change Quantity</label> </th>
                        </tr>
                        <tr>
                            <td> <input type='text' name='newName' value="<?php echo $items['fld_item']; ?>" required> </td>
                            <td> <input type='text' name='newQuantity' value="<?php echo $items['fld_quantity']; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> <a href='inventory.php'> Back </a> </td>
                            <td> <input type='submit' name="submit" value='Save Changes'> </td>
                        </tr>
                    </table>
                </form>
        </section>
    </div>

    <div class="footer">
        <p>© Healthcare Management System 2024</p>
    </div>
</body>
</html>
