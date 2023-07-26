<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .success-message {
            color: green;
            font-size: 20px;
        }
        .error-message {
            color: red;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <?php
        session_start();
if (isset($_SESSION['currentusid'])) {
    $currentID = $_SESSION['currentusid'];
} else {
    $currentID = '';
    echo "<script>alert('Please register or login to use the service.');</script>";
    echo "<script>window.location.href = 'homeScreen.php';</script>";
}

if (isset($_SESSION['currenttrans'])) {
    $currenttrans = $_SESSION['currenttrans'];
}

if (isset($_SESSION['currentID'])) {
    $currentIDnew = $_SESSION['currentID'];
}


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "offline_pocket";

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

$sql = "SELECT * FROM gametransaction  WHERE transactionID=$currenttrans";
$sql2 = "SELECT * FROM gametransaction WHERE userID=$currentID";
$sql7 = "SELECT * FROM users WHERE user_id=$currentIDnew";

$result3 = mysqli_query($conn, $sql2);
$IDs = mysqli_fetch_assoc($result3);

$result = mysqli_query($conn, $sql);
$ID = mysqli_fetch_assoc($result);

$Trans_no = $ID['transactionID'];
$server = $ID['userServer'];
$recha = $ID['realCurrency'];
$Payment = $ID['paymentType'];
$usid = $IDs['userID'];
$fill = $ID['gameName'];
$email = $ID['userEmail'];
$gamecu = $ID['inGameCurrency'];



///connect to user
    $query = "SELECT account_id,username, balance FROM bank_account_table WHERE account_id = 1 ";
    $result2 = mysqli_query($conn, $query);
    $ID2 = mysqli_fetch_assoc($result2);

    // Assign the balance variable from the database query result
    $balance = $ID2['balance'];
    $usernames = $ID2['username'];
    $balancenew = $balance - $recha;



        // Check if the payment is approved or canceled
        if (isset($_POST['approved'])) {
            // Payment is approved
		$sqle ="INSERT INTO status(user_id,transactionID,status_approval,status_admin) VALUES('$currentIDnew','$Trans_no','paid','No evaluation')";


		$sendsqle = mysqli_query($conn, $sqle);

		$update_sql = "UPDATE bank_account_table SET balance='$balancenew' WHERE account_id=1";
    		mysqli_query($conn, $update_sql);


            echo '<p class="success-message">Payment Successful!</p>';
            // Retrieve and display the order details
            echo '<fieldset>';
            echo '<p style="font-size: 20px; color: darkblue;"><b>What you have ordered:</b></p>';
            echo '<p><b>Username:</b> ' . $usid . '</p>';
            echo '<p><b>Game Name:</b> ' . $fill . '</p>';
            echo '<p><b>details of recharge:</b> ' . $gamecu . ' in game currency </p>';
            echo '<p><b>Email:</b> ' . $email . '</p>';
            echo '</fieldset>';
        } elseif (isset($_POST['cancel'])) {
            // Payment is canceled

		$sqle ="INSERT INTO status(user_id,transactionID,status_approval,status_admin) VALUES('$currentIDnew','$Trans_no','cancelled','No evaluation')";


		$sendsqle = mysqli_query($conn, $sqle);
            echo '<p class="error-message">Payment Failed!</p>';
            // Display a message for canceled payment
            echo '<p>Unfortunately, the payment process has been canceled.</p>';
        } else {
            // Invalid access to this page, redirect to the process_payment.php
            header("Location: process_payment.php");
            exit();
        }

        echo '<p style="font-size: 20px; color: darkblue;"><b>Your Receipt</b></p>';
	echo '<p><b>transaction id :</b> ' . $Trans_no . '</p>';
	echo '<p><b>price          :</b> RM ' . $recha . '</p>';
        echo '<p><b>username       :</b> ' . $usernames . '</p>';
        echo '<p><b>balance        :</b> RM ' . $balancenew . '</p>';


        ?>
        <p style="font-size: 20px; color: darkblue;"><b>Your Receipt:</b></p>
        <!-- Add the receipt details here for both approved and canceled payments -->
        <!-- For example: -->
        <!-- <p><b>Username:</b> <?php echo $cake; ?></p> -->
        <!-- <p><b>Game Name:</b> <?php echo $fill; ?></p> -->
        <!-- <p><b>Type of recharge:</b> <?php echo $candle; ?></p> -->
        <!-- <p><b>Email:</b> <?php echo $email; ?></p> -->
        <!-- <p><b>Total Payment:</b> <?php echo $total_payment; ?></p> -->

        <button onClick="window.print()">Print</button>
        <br>
        <br>
        <button onClick="window.location.href='HomeScreen.php'">Back</button>
    </div>


</body>
</html>
