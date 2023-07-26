<!DOCTYPE html>
<?php session_start();?>


<html>
<head>
	<link href="loginStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	
	
</head>
<body>
	<div class="wrapper" id="myForm">
		<span class="icon-close"><ion-icon name="close" style="color:black;"></ion-icon></span>
		<div class="form-box login">
			<h2>Login</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

				<div class="input-box">
					<span class="icon"><ion-icon name="mail"></ion-icon></span>
					<input type ="email" name="email" required>
					<label>Email</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type ="password" name="password" required>
					<label>Password</label>
				</div>
				<div class="remember-forgot">
					<label><input type="checkbox">Remember Me</label>
					<a href="#">Forgot Password?</a>
				</div>
				<button type ="submit" class="btn">Login</button>
				<div class="login-register">
					<p>Don't have an account?<a href="#" class="register-link">Register</a></p>
				</div>
			</form>
		</div>


		<div class="form-box register">
			<h2>Register</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="input-box">
					<span class="icon"><ion-icon name="mail"></ion-icon></span>
					<input type="email" name="email" required>
					<label>Email</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input type="text" name="username" required>
					<label>Username</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				<div class="remember-forgot">
					<label><input type="checkbox" required>I agree to the terms and conditions</label>
				</div>
				<button type="submit" class="btn">Register</button>
				<div class="login-register">
					<p>Already have an account? <a href="#" class="login-link">Login</a></p>
				</div>
			</form>
		</div>
	</div>

	<?php
	// Check if the form is submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
		// Database connection details
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Offline_Pocket";

		// Establish a database connection
		$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

		// Retrieve the form data
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		

		// Prepare and execute the SQL query to check if the username already exists
		$checkQuery = "SELECT * FROM admin WHERE username = '$username'";
		$checkResult = mysqli_query($connect, $checkQuery);

		if (mysqli_num_rows($checkResult) > 0) {
			// Display an error message if the username already exists
			echo "<script>alert('Registration successful! You can now login.');</script>";
			$_SESSION['currentUser'] = $username;
				$_SESSION['currentEmail'] = $email;
				$_SESSION['currentPassword'] = $password;
				 echo "<script>window.location.href = 'dashboard.php';</script>";
				
			// Start the session
			

		} else {
			// Prepare and execute the SQL query to insert the new admin data into the "admin" table
			$insertQuery = "INSERT INTO users (user_username, user_password, user_email) VALUES ('$username', '$password', '$email')";
			$insertResult = mysqli_query($connect, $insertQuery);

			if ($insertResult) {
				// Provide a success message to the user
				$_SESSION['currentUser'] = $username;
				$_SESSION['currentEmail'] = $email;
				$_SESSION['currentPassword'] = $password;
				
				
			
				echo "<script>alert('Registration successful!!!.');</script>";
				
			} else {
				// Display an error message if the registration process fails
				echo "<script>alert('Registration failed. Please try again.');</script>";
			}
		}

		// Close the database connection
		mysqli_close($connect);
	}
	?>
	
	<?php
	// Check if the form is submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
		// Database connection details
		 $hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Offline_Pocket";
		
		
			
		// Establish a database connection
		$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

		// Retrieve the form data
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Prepare and execute the SQL query to check if the user exists in the "admin" table
		$sqlcheck = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($connect, $sqlcheck);
		
		// Prepare and execute the SQL query to check if the user exists in the "admin" table
		$sqlcheck2 = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
		$result2 = mysqli_query($connect, $sqlcheck2);
		
		
		
			// User exists, set session or perform authentication logic
			// Replace the following line with your desired logic
			if (mysqli_num_rows($result) > 0) {
			$record=mysqli_fetch_array($result);
			
			echo "<script>alert('Login successful!');</script>";
			

				$_SESSION['currentUser'] = $record['username'];
				$_SESSION['currentEmail'] = $record['email'];
				$_SESSION['currentID'] = $record['id'];
				$_SESSION['currentPassword'] = $record['password'];
				 echo "<script>window.location.href = 'dashboard.php';</script>";
				
		} else if(mysqli_num_rows($result2) > 0) {
				$record=mysqli_fetch_array($result2);
			
			echo "<script>alert('Login successful!');</script>";

				$_SESSION['currentUser'] = $record['user_username'];
				$_SESSION['currentEmail'] = $record['user_email'];
				$_SESSION['currentID'] = $record['user_id'];
				$_SESSION['currentPassword'] = $record['user_password'];
				 
			
		}else {
			// User doesn't exist or invalid credentials
			echo "<script>alert('Invalid email or password. Please try again.');</script>";
			 echo "<script>window.location.href = 'homeScreen.php';</script>";
		}

		// Close the database connection
		mysqli_close($connect);
	}
	
	?>
</body>
</html>
