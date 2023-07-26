<!DOCTYPE html>

<html>
<head>
    <title>Bank Transaction Interface</title>
    <link rel="stylesheet" type="text/css" href="paymentStyle.css">
</head>
<body>
    <div class="outer-layer">
        <div class="inner-layer">
            <div class="logo">
                <img src="pocketImage/icon/islam.png" alt="Bank Logo">
            </div>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="button-group">
                    <button class="back-button" name="back">Back</button>
                    <button type="submit" class="login-button" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script>
  // Find the button element by its class
  const backButton = document.querySelector('.back-button');

  // Add an event listener to the button
  backButton.addEventListener('click', function () {
    // Redirect the user to homescreen.php
    window.location.href = 'homescreen.php';
  });
</script>
</body>
</html>


<?php
session_start();


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "offline_pocket";

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");



        


// Retrieve the submitted username and password from the form
if (isset($_POST['username']) && isset($_POST['password'])&&isset($_POST['login'])) {
    $usernames = $_POST['username'];
    $password = $_POST['password'];

    $transaction_no = 100012120001;

    // Perform user authentication against the bank_account_table
    $query = "SELECT username, password FROM bank_account_table WHERE username = '$usernames' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        // Successful login, redirect to the payment approval interface
        
        // Store the username in a session variable
        $_SESSION['username'] = $usernames;

        header("Location: process_payment.php");
        exit(); // Add an exit statement to stop the script from executing further
    } else {
        // Invalid credentials, show an error message
        $message = "Invalid username or password. Please try again";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
else if(isset($_POST['back'])){header("location:homescreen.php");}




// Close the database connection
mysqli_close($conn);


/*
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";

        $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

  

// Retrieve the submitted username and password from the form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform user authentication against the accounts_table
    $query = "SELECT username,password FROM bank_account_table WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        // Successful login, redirect to the payment approval interface
        header("Location: process_payment.php");
        exit();
    } else {
        // Invalid credentials, show an error message
      
        $message = "Invalid username or password. Please try again";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh:0");

       
    }

}

// Close the database connection
mysqli_close($conn);
*/
?>



