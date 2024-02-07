<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/login-style.css">
	<title>Log In</title>
</head>
<body>
	<div class="login-box">
		<p>Login</p>
		<form method="POST">
			<div class="user-box">
				<input required="" name="email" type="text">
				<label>Email</label>

			</div>
			<div class="user-box">
				<input required="" name="password" type="password">
				<label>Password</label>

			</div>

			<a href="#">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<input type="submit" name="submit" value="Login" class="sub">

			</a>
			<?php
				session_start();

				$DBHost = "localhost";
				$DBUser = "root";
				$DBPass = "";
				$DBName = "healthcaredb";
				$conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
						
				if(isset($_POST["submit"])){
					$email = $_POST["email"];
					$password = $_POST["password"];

					$fetchUser = "SELECT * FROM tbl_users WHERE fld_email='$email' AND fld_pass='$password';";
					$userResult = mysqli_query($conn, $fetchUser);

					if (mysqli_num_rows($userResult) == 1) {
						$user=mysqli_fetch_assoc($userResult);

						$_SESSION['userid'] = $user['fld_userID'];
        				$_SESSION['username'] = $user['fld_username'];
						$_SESSION['loggedIn'] = true;

						header("location: home.php");
						exit();
					} 
					else {
						echo "<p class='result'> Invalid credentials. </p>";
					}
				}
			?>
		</form>
		<p>Don't have an account? <a href="sign-up.php" class="a2">Sign up!</a></p>

	</div>

</body>
</html>