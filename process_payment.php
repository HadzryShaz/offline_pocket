

<html>
<head>
    <title>Bank Transaction Interface</title>
    <link rel="stylesheet" type="text/css" href="paymentStyle.css">
        <style>
        /* Add the provided CSS code here */
        .outer-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .inner-layer {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            text-align: center; /* Center-align the content */
			height:80%;
			overflow-y:scroll;
        }

        .logo img {
            max-width: 450px;
            height: auto;
            margin-bottom: 20px;
            border: 2px solid #000; /* Add border style */
            border-radius: 5px; /* Add border radius */
            padding: 5px; /* Add some padding within the border */
        }

        .form-group {
            margin-bottom: 10px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
        }

        .login-button,
        .back-button {
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button:hover,
        .back-button:hover {
            background-color: #8b0000; /* Darker red on hover */
        }
		body{
			overflow-y:scroll;
		}
    </style>
</head>
<body>
    <div class="outer-layer">
        <div class="inner-layer">
            <div class="logo">
                <img src="pocketImage/icon/islam.png" alt="Bank Logo">
                
            </div>






            
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

$result3 = mysqli_query($conn, $sql2);
$IDs = mysqli_fetch_assoc($result3);

$result = mysqli_query($conn, $sql);
$ID = mysqli_fetch_assoc($result);

$Trans_no = $ID['transactionID'];
$server = $ID['userServer'];
$recha = $ID['realCurrency'];
$Payment = $ID['paymentType'];
$usid = $ID['gameName'];

// Access the stored username from the session variable

    $query = "SELECT account_id,username, balance FROM bank_account_table WHERE account_id = 1 ";
    $result2 = mysqli_query($conn, $query);
    $ID2 = mysqli_fetch_assoc($result2);

    // Assign the balance variable from the database query result
    $balance = $ID2['balance'];
    $usernames = $ID2['username'];

    // Use the $username value in your queries or output wherever you need it
    // ...

    // For example, you can use it to display the username in the HTML output


echo "<p>Transaction no : </p>";
echo $Trans_no;
echo "<p>username : </p>";
echo $usernames;
echo "<p>balance : </p>";
echo "RM".$balance;
echo "<p>Pay Amount : </p>";
echo "RM".$recha;
echo "<p>Type of payment : </p>";
echo $Payment;
echo "<p>Details : </p>";
echo " Recharging to account : " . $usid . "<br><br>Server : " . $server;

// Close the database connection
mysqli_close($conn);



            /*
            session_start();
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "offline_pocket";

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

    $sql = "SELECT * FROM gametransaction WHERE user_id=100 and transactionID=1";

    $result = mysqli_query($conn, $sql);
    $ID = mysqli_fetch_assoc($result);

    $Trans_no = $ID['transactionID'];
    $server = $ID['userServer'];
    $recha = $ID['realCurrency'];
    $Payment = $ID['paymentType'];
    $usid = $ID['user_id'];


    if (isset($_SESSION['username'])) 
        $usernames = $_SESSION['username'];
    

    $query = "SELECT account_id, balance FROM bank_account_table WHERE $usernames ";
    $result2 = mysqli_query($conn, $query);
    $ID2 = mysqli_fetch_assoc($result2);

    // Access the stored username from the session variable


    echo "<p>Transaction no :<p><br>";
    echo $Trans_no;
    echo "<p>username :<p><br>";
    echo $usernames;
    echo "<p>balance :<p><br>";
    echo $balance;
    echo "<p>Pay Amount :<p><br>";
    echo $recha;
    echo "<p>Type of payment<p><br>";
    echo $Payment;
    echo "<p>Details :<p><br>";
    echo "Recharging to account".$usid."<br>Server".$server;
*/






             ?>




<br>
<br>
<form method="post" action="receipt.php">
    <input type="submit" name="approved" value="Approved" class="back-button">
    <input type="submit" name="cancel" value="Cancel"class="back-button">

        </div>

</form>
        
        
    </div>
</body>
</html>

