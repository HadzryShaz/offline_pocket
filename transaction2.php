


<!DOCTYPE html>

<html>
<head>
	<title>Offline Pocket | Online Game Top up Website</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="transactionStyle2.css" rel="stylesheet" type="text/css" />
	 <link href="termStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<?php 
	include 'header.php';
?>

<body>

<?php
if(isset($_SESSION['currentUser'])){
							$currentID = $_SESSION['currentID'];
							
							}else{
							$currentID = '';
							echo "<script>alert('Please register or login to use the service.');</script>";
							echo "<script>window.location.href = 'homeScreen.php';</script>";
							};

?>
	
		<div class="middle-content" id="all">
			<div class="left-part">
				<div class="left-part-stick" >
					<div class="stay">
						<div class="adv-section">
						
						
						
                                        
    <div class="product-details_content">
	
	<div class="product-details_banner-container">
    <?php
    // Check if the gameImage is set and not empty
	if (isset($_GET['id'])) {
		$productID = $_GET['id'];

					// Retrieve product details from the database
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "Offline_Pocket";

					$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

					$sql = "SELECT * FROM gameData WHERE id = $productID";
					$result = mysqli_query($connect, $sql);

					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
    if (isset($row['gameBanner']) && !empty($row['gameBanner'])) {
        echo '<img class="banner" style="overflow:hidden;" src="' . $row['gameBanner'] . '" >';
    } else {
        // If the gameImage is not set or empty, display a placeholder image or an error message
        echo '<img class="banner" src="placeholder_image.jpg" >'; // Replace "placeholder_image.jpg" with the path to your default image
        // Or display an error message:
        // echo '<p>No game banner available.</p>';
    }
		// Close the database connection
					
				} else {
					echo "<p>Product ID not provided.</p>";
				}
	}
    ?>
</div><br>
      <p> Our company has partner with all game developer for making an easy, safe and convenient top up </p><br>
      
	  <p> As passionate gamers ourselves, we recognize the value of fair play and the importance of balancing the needs of both players and game developers. <br>
	  We strive to maintain a transparent and ethical approach to in-game purchases, offering options that enhance gameplay while preserving the integrity and enjoyment of the gaming experience.</p><br>

      <p> Pay conveniently with the lovely and pride of BankIslam.</p>
	  
	  </div>
						
						
							
					</div>
					</div>
					<br>
					
				</div>
			</div>

			<div class="right-part">
			<div class="all-section" id="all-section">
			<!-- Product Details -->
				<?php
				// Check if the product ID is provided
				if (isset($_GET['id'])) {
					
					$productID = $_GET['id'];

					// Retrieve product details from the database
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "Offline_Pocket";

					$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

					$sql = "SELECT * FROM gameData WHERE id = $productID";
					$result = mysqli_query($connect, $sql);

					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);

						// Display the product details
						echo '<div class="product-details">';
						
						
						
						
						echo '<h4> ' . $row['gameName'] . '</h4>';
						echo '<h3>' . $row['gameType'] . '</h3>';
						
						echo '<form action="transaction2.php" method="post" class="form">';
						
						echo '<div class="data">';
						echo '<div class="number">';
						echo '<h2>1</h2>';
						echo '</div>';					
						echo '<div class="form-group">';
						echo '<label for="user_id">User ID:</label>';
						echo "<br>";
						echo '<input type="number" name="user_id" id="user_id" required>';
						echo '</div>';
						echo '</div>';
						
						
						echo '<div class="data">';
						echo '<div class="number">';
						echo '<h2>4</h2>';
						echo '</div>';
						echo '<div class="payment-info">';
						echo '<div class="currency-label">Choose Your Ingame Server</div>';
						echo '<div class="saja2">';

						echo '<input type="button" class="server-btn " value="Asia" onclick="setServerType(\'Asia\')">';
						echo '<input type="button" class="server-btn " value="China" onclick="setServerType(\'China\')">';
						echo '<input type="button" class="server-btn "  value="Europe" onclick="setServerType(\'Europe\')">';
						echo '<input type="button" class="server-btn "  value="North America" onclick="setServerType(\'North America\')">';
						echo '<input type="button" class="server-btn "  value="South America" onclick="setServerType(\'South America\')">';
						
						echo '</div>';
						echo '<input type="hidden" name="user_server" id="user_server" >';
						echo '</div>';
						echo '</div>';
						
						
						echo '<div class="data">';
						echo '<div class="number">';
						echo '<h2>3</h2>';
						echo '</div>';
						echo '<div class="currency-info">';
						echo '<div class="currency-label">Choose Ingame Currency:</div>';
						echo '<div class="saja">';
						
						echo '<div class="saja-btn">';
						

						echo '<input type="button" class="currency-btn" value="' . $row['nameIngameCurrency'] . ' ' . $row['ingameCurrency1'] . '" onclick="setPrice(\'' . $row['realCurrency1'] . '\', \'' . $row['nameIngameCurrency'].'  '. $row['ingameCurrency1'] . '\')">'; 

						echo '<h1>RM ' . $row['realCurrency1'] . '</h1>';
						echo '</div>';
						
						echo '<div class="saja-btn">';
						echo '<input type="button" class="currency-btn" value="' . $row['nameIngameCurrency'] . ' ' . $row['ingameCurrency2'] . '" onclick="setPrice(\'' . $row['realCurrency2'] . '\', \''. $row['nameIngameCurrency'].'  '. $row['ingameCurrency2'] . '\')">'; 

						echo '<h1>RM ' . $row['realCurrency2'] . '</h1>';
						echo '</div>';
						
						echo '<div class="saja-btn">';
						echo '<input type="button" class="currency-btn" value="' . $row['nameIngameCurrency'] . ' ' . $row['ingameCurrency3'] . '" onclick="setPrice(\'' . $row['realCurrency3'] . '\', \''. $row['nameIngameCurrency'].'  '. $row['ingameCurrency3'] . '\')">'; 

						echo '<h1>RM ' . $row['realCurrency3'] . '</h1>';
						echo '</div>';
						
						echo '<div class="saja-btn">';
						echo '<input type="button" class="currency-btn" value="' . $row['nameIngameCurrency'] . ' ' . $row['ingameCurrency4'] . '" onclick="setPrice(\'' . $row['realCurrency4'] . '\', \''. $row['nameIngameCurrency'].'  '. $row['ingameCurrency4'] . '\')">'; 

						echo '<h1>RM ' . $row['realCurrency4'] . '</h1>';
						echo '</div>';
						
						echo '<div class="saja-btn">';
						echo '<input type="button" class="currency-btn" value="' . $row['nameIngameCurrency'] . ' ' . $row['ingameCurrency5'] . '" onclick="setPrice(\'' . $row['realCurrency5'] . '\', \''. $row['nameIngameCurrency'].'  '. $row['ingameCurrency5'] . '\')">'; 

						echo '<h1>RM ' . $row['realCurrency5'] . '</h1>';
						echo '</div>';
						echo '</div>';
						echo '<input type="hidden" name="realCurrency" id="realCurrency_input">';
						echo '<input type="hidden" name="ingameCurrency" id="ingameCurrency_input">';

						echo '</div>';
						echo '</div>';
						
						echo '<div class="data">';
						echo '<div class="number">';
						echo '<h2>4</h2>';
						echo '</div>';
						echo '<div class="payment-info">';
						echo '<div class="currency-label">Choose Ingame Payment Method:</div>';
						echo '<div class="saja2">';

						echo '<input type="button" class="payment-btn fpx-btn" onclick="setPaymentType(\'Online Banking\')">';
						echo '<input type="button" class="payment-btn razer-btn" onclick="setPaymentType(\'Razor Pay\')">';
						echo '<input type="button" class="payment-btn molpay-btn"  onclick="setPaymentType(\'Mol Pay\')">';
						
						echo '</div>';
						echo '<input type="hidden" name="paymentType" id="paymentType" >';
						echo '</div>';
						echo '</div>';
						
						
						echo '<div class="data">';
						echo '<div class="number">';
						echo '<h2>5</h2>';
						echo '</div>';
						echo '<div class="form-group">';
						echo '<label for="user_email">User E-mail (optional) :</label>';
						echo '<input type="text" name="user_email" id="user_email" >';
						echo '</div>';
						echo '</div>';
						
						
						
						echo '<input type="hidden" name="userCurrent_id" value="' . $currentID . '">';
						echo '<input type="hidden" name="gameName" value="' . $row['gameName'] . '">'; 
						echo '<input type="hidden" name="gameType" value="' . $row['gameType'] . '">'; 
						echo '<input type="hidden" name="productID" value="' . $productID . '">'; 
						echo '<div class="data2">';
						echo '<button type="submit" name="submit" class="btn-pay">Submit Transaction</button>';
					

						echo '</form>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						
					} else {
						echo "<p>Product not found.</p>";
					}

					// Close the database connection
					mysqli_close($connect);
				} else {
					echo "<p>Product ID not provided.</p>";
				}
				
				?>
				
				
				<!-- ... Your existing HTML and PHP code ... -->

<?php
// ... Your existing PHP code ...

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure that all required fields are present and not empty
    if (isset($_POST['user_id']) && isset($_POST['submit']) ) {
		$NewCurrentID =  $_POST['userCurrent_id'];
		$gameID = $_POST['productID'];
		$gameName = $_POST['gameName'];
		$gameType = $_POST['gameType'];
        $user_id = $_POST['user_id'];
		 $userServer = $_POST['user_server'];
        $realCurrency = $_POST['realCurrency'];
		$inGameCurrency = $_POST['ingameCurrency'];
        $paymentType = $_POST['paymentType'];
        $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';

        // Connect to the database
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Offline_Pocket";

        $connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

        // Escape the user inputs to prevent SQL injection
      

        // Insert the data into the "gameTransaction" table

        $sql = "INSERT INTO gametransaction ( gameID, gameName, gameType, userID, userServer, realCurrency, inGameCurrency, paymentType, userEmail) 
                VALUES ('$gameID','$gameName', '$gameType', '$user_id', '$userServer', '$realCurrency', '$inGameCurrency', '$paymentType', '$user_email')";





       $sqli = "SELECT transactionID, userID FROM gametransaction ORDER BY transactionID DESC ";
		$result4 = mysqli_query($connect, $sqli);

if ($result4) {
    if (mysqli_num_rows($result4) > 0) {
        $record = mysqli_fetch_array($result4);

        $currenttrans = $record['transactionID'] + 1;
        $_SESSION['currentusid'] = $record['userID'];
        $_SESSION['currenttrans'] = $currenttrans;
    }
}

                

        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('You will be redirected to the payment page.');</script>";
            echo "<script>window.location.href = 'payment.php';</script>";
        } else {
            echo "<p>Error: " . mysqli_error($connect) . "</p>";
        }

        // Close the database connection
        mysqli_close($connect);
    } else {
        echo "<p>Please fill in all required fields.</p>";
    }
}
?>

			
			
			
			
			
			
   
			</div>
			</div>

		
	</div>

	<script>
		// Side Navigation
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("all").style.opacity = "0.3";
			document.body.classList.add("sidenav-open");
			
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("all").style.opacity = "1";
			document.body.classList.remove("sidenav-open");
			
		}
		
		
		
		// Login & Register
		const wrapper = document.querySelector('.wrapper');
		const loginLink = document.querySelector('.login-link');
		const registerLink = document.querySelector('.register-link');
		const btnPopup = document.querySelector('.btnLogin-popup');
		const iconClose = document.querySelector('.icon-close');
		const btnLogin = document.getElementById('login');
		const btnLogout = document.getElementById('logout');

		registerLink.addEventListener('click', () => { wrapper.classList.add('active'); });
		loginLink.addEventListener('click', () => { wrapper.classList.remove('active'); });
		btnPopup.addEventListener('click', () => {
			wrapper.classList.add('active-popup');
			document.getElementById("myForm").style.display = "flex";
			document.getElementById("all").style.opacity = "0.1";
		});
		iconClose.addEventListener('click', () => {
			wrapper.classList.remove('active-popup');
			document.getElementById("myForm").style.display = "none";
			document.getElementById("all").style.opacity = "1";
		});
		
		
		//-------------------recharge  button----------------
		
		function setPrice(realCurrency, ingameCurrency) {
    // Assuming you have an input field with the id 'realCurrency_input' and 'ingameCurrency_input'
    var realCurrencyInput = document.getElementById('realCurrency_input');
    var ingameCurrencyInput = document.getElementById('ingameCurrency_input');
    
    realCurrencyInput.value = realCurrency;
    ingameCurrencyInput.value = ingameCurrency;

    // If you want to do something else with the selected price, you can add your logic here
    var buttons = document.getElementsByClassName('currency-btn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('selected');
    }

    event.target.classList.add('selected');
}


		//-------------------payment  button----------------
	function setPaymentType(paymentType) {
    // Assuming you have an input field with the id 'price_input'
    var paymentTypeInput = document.getElementById('paymentType');
    paymentTypeInput.value = paymentType;

    // If you want to do something else with the selected price, you can add your logic here
    var buttons = document.getElementsByClassName('payment-btn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('selected');
    }

    event.target.classList.add('selected');
}

function setServerType(serverType) {
    // Assuming you have an input field with the id 'price_input'
    var paymentTypeInput = document.getElementById('user_server');
    paymentTypeInput.value = serverType;

    // If you want to do something else with the selected price, you can add your logic here
    var buttons = document.getElementsByClassName('server-btn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('selected');
    }

    event.target.classList.add('selected');
}
		
		
		
		
		

	</script>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
