<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Sign Up</title>
<link rel="stylesheet" href="../css/login-style.css">
</head>
  <body>
    <div class="reg-container">
      <header>Signup Form</header>
      <div class="progress-bar">
        <div class="step">
          <p>Basic</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="prog"></div>
        </div>
        <div class="step">
          <p>Contact</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="prog"></div>
        </div>
        <div class="step">
          <p>Birth</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="prog"></div>
        </div>
        <div class="step">
          <p>Submit</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="prog"></div>
        </div>
      </div>
      <div class="form-outer">
        <form method="POST" class="reg-form">
          <div class="page slide-page">
            <div class="title">Basic Info:</div>
            <div class="field">
              <label>Full Name</label>
              <!-- <div class="label">First Name</div> -->
              <input required name="fullName" type="text">
            </div>
            <div class="field">
              <label>Group</label>
              <!-- <div class="label">Last Name</div> -->
              <!-- <input required="" name="" type="text"> -->
              <select name="userGroup">
                <option value="1">Health Care Professional</option>
                <option value="2">Patient</option>
              </select>
            </div>
            <div class="field btns">
              <button class="firstNext next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Contact Info:</div>
            <div class="field">
              <label>Address</label>
              <!-- <div class="label">Email Address</div> -->
              <input required name="address" type="text">
            </div>
            <div class="field">
              <label>Phone Number</label>
              <!-- <div class="label">Phone Number</div> -->
              <input required name="phone" type="Number">
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Previous</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Birth:</div>
            <div class="field">
              <!-- <label>Date</label> -->
              <div class="label">Date</div>
              <input required name="birth" type="date">
            </div>
            <div class="field">
              <!-- <label>Gender</label> -->
              <div class="label">Gender</div>
              <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Login Details:</div>
            <div class="field">
              <label>Email</label>
              <!-- <div class="label">Username</div> -->
              <input required name="email" type="text">
            </div>
            <div class="field">
              <label>Password</label>
              <!-- <div class="label">Password</div> -->
              <input required name="password" type="Password">
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>

              <button type="submit" name="submit" class="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPass = "";
        $DBName = "healthcaredb";
        $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
        
        if(isset($_POST["submit"])){
          $fullName = $_POST["fullName"];
          $userGroup = $_POST["userGroup"];
          $address = $_POST["address"];
          $phone = $_POST["phone"];
          $birth = $_POST["birth"];
          $gender = $_POST["gender"];
          $email = $_POST["email"];
          $password = $_POST["password"];

          $registerQuery = "INSERT INTO tbl_users (fld_userName, fld_address, fld_phone, fld_birth, fld_gender, fld_email, fld_pass, fld_groupID) VALUES
          ('$fullName', '$address', '$phone', '$birth', '$gender', '$email', '$password', '$userGroup')";
          $addUser = mysqli_query($conn, $registerQuery);
        }
    ?>
    <script src="../js/script.js"></script>

  </body>
</html>
