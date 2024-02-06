<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
    <?php
        session_start();

        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";
        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        $loggedIn = $_SESSION['loggedIn'] ?? false;
        
    ?>

    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="#"> PUP Biñan Doctors </a>
            </div>
            <div class="nav">
                <a class="active" href="Home.php">Home</a>
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
                            <a href="Inventory.php">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                    else {
                        echo '
                            <a href="appointment.php">Appointments</a>
                            <a href="#" onclick="alert(\'The records section is for doctors only.\');">Records</a>
                            <a href="#" onclick="alert(\'The inventory section is for doctors only.\');">Inventory</a>
                            <a href="ContactingHospital.php">About Us</a>
                        ';
                    }
                }
                else{
                    echo '
                    <a href="#" onclick="alert(\'Please login first.\');">Appointments</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Records</a>
                    <a href="#" onclick="alert(\'Please login first.\');">Inventory</a>
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
        <div class="bod">
            <div class="main">
                <div class="content">
                    <div class="title">
                        <p>PUP Biñan Doctors</p><hr>
                    </div>
                    <div class="description">
                        <p> Your health is our priority, and we are here to serve you with the highest standards of medical care. 
                            Explore our comprehensive range of medical specialties, advanced technologies, 
                            and a team of skilled healthcare professionals committed to your health and recovery.
                            Welcome to a healthier tomorrow at PUP Biñan Doctors.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-bod">
            <div class="second-content">
                <a href="https://www.who.int/philippines/news/feature-stories/detail/20-health-tips-for-2020"><div class="info">
                    <img src="https://www.gcaffe.com/wp-content/uploads/2018/10/Physical-activity.jpg">
                    <div class="text">
                        <p class="ttl">20 health tips for 2020</p>
                        <p class="desc">The start of a new decade brings with it new resolutions to improve one’s life, including a healthier lifestyle. Here are 20 practical health tips to help you start off towards healthy living in 2020.</p>
                        
                    </div>

                </div></a>

                <a href="https://www.who.int/campaigns/world-health-day"><div class="info">
                    <div class="text right">
                        <p class="ttl"> 7 April is World Health Day</p>
                        <p class="desc">It is celebrated annually and each year draws attention to a specific health topic of concern to people all over the world.<br>The date of 7 April marks the anniversary of the founding of WHO in 1948.</p> 

                    </div>
                    <img src="https://www.icn.ch/sites/default/files/styles/icn_cover_half_width_md/public/2023-06/thumbnail_for%20website_WHO75.jpeg?h=bc8a8ef5&itok=v2tcIZSb">

                </div></a>

                <div class="video-container">
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube-nocookie.com/embed/Misq7MUutho?si=J1QKpgefqh3y19Ff" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">What is safe food?</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/y9qpTp8yyi4?si=90quVlfyaqRHxGwW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">COVID-19 Vaccine</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/Fe4C9ViYIvo?si=9_SbDNKdreuZvHrS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">World Hand Hygiene</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/nHIy04e7Y50?si=UCgz0wNnClkNh_ne" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">Reproductive health</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/kOISEM6L4xk?si=cxM2wHcIapzb8C9F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">Blood Donation</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>
                    <div class="vid">
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/SI3JtJTlDyY?si=j2ZFp_qkszI_ZLKX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="text cent">
                            <p class="ttl">Maternal Health</p>
                            <!-- <p class="desc">This animated film was developed by WHO to explain what is safe food and to share everyday food safety tips to follow at home.<br>More information here: <a href="https://www.who.int/news-room/fact-sheets/detail/food-safety">https://www.who.int/news-room/fact-sheets/detail/food-safety</a></p> -->
                        </div>
                    </div>

                </div>
                
                
                
            </div>
            
        </div>


        <div class="footer">
            <p>© PUP Biñan Doctor 2024</p>
        </div>
    </div>
</body>
</html>