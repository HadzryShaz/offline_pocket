<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link href="adminStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<div class="kotak">
		<?php include 'login.php'; ?>
	</div>

	
		<nav class="navs">
			<span style="font-size:30px; color:red; padding-left:20px; cursor:pointer" onclick="openNav()">&#9776;</span>
			<div class="logo"><a href="dashboard.php">OFFLINE POCKET<span style="font-size:30px; color:red;" class="material-symbols-outlined" >
			playing_cards</span></a></div>
			<div class="moto">"Upgrade Your Game, Upgrade Your Wallet.</div>
			
			
			<!-- check if user have logged in -->
			<div class="nav-links">
				<?php if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) { ?>
					<ul>
					<li><form><input type="text" id="searchInput" name="search" placeholder="Search.." onkeydown="handleSearch(event)" ></form></li>
						
						<li>

						


						
							<?php 
							if(isset($_SESSION['currentUser'])){
							$currentUser = $_SESSION['currentUser'];
							echo "<li><a class='btnLogout-popup' onclick='confirmLogout()'>Logout</a></li>"; 
							}else{
							$currentUser = 'Not logged in';
							};
							?>


							<!--
							<div class="sub-menu-1">
								<ul>
									<li><a href='#logut'>Log out</a></li>
								</ul>
							</div>
						-->
							</a></li>
						<li><a href="news.php">News</a></li>
						<li><a href="aboutUs.php">About Us</a></li>
					</ul>
			

						<!-- if user have not logged in -->
				<?php } else { ?>
			
			
				<ul>
					<li><form><input type="text" id="searchInput" name="search" placeholder="Search.." onkeydown="handleSearch(event)" ></form></li>
						<?php 
							if(isset($_SESSION['currentUser'])){
							$currentUser = $_SESSION['currentUser'];
							 $currentEmail = $_SESSION['currentEmail'];
							echo "<li><a class='btnLogout-popup' onclick='confirmLogout()'>Logout</a></li>"; 
							}else{
							$currentUser = 'Not logged in';
							echo "<li><a  class='btnLogin-popup'>Login</a></li>";
							};
							?>
					
					
					
				</ul>
				<?php } ?>
			</div>
		</nav>
		
		<?php 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['username'])) {
    if (isset($_SESSION['currentUser'])) {
        $currentUser = $_SESSION['currentUser'];
        $currentEmail = $_SESSION['currentEmail'];
    } else {
        $currentUser = 'No Data';
        $currentEmail = 'No Data';
    }
} else if (isset($_SESSION['currentUser'])) {
    $currentUser = $_SESSION['currentUser'];
    $currentEmail = $_SESSION['currentEmail'];
} else {
    $currentUser = 'No Data';
    $currentEmail = 'No Data';
}
?>
		
		<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		
			
				<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
				
				<a  style="background-color:white; color:black;" class="w3-bar-item w3-button"><?php echo $currentUser;?></a>
				
				</div>
				<a href="dashboard.php">Dashboard</a>
		<a href="admin.php">Game Data</a>
		<a href="adminEditUser.php">User Data</a>
		<a href="transactionList.php">Transaction List</a>
	</div>

<div class="middle-content">
	<div class="left-part">
		<div class="left-part-stick">
			<div class="edit-section">
			<div class="container">
					<h2>Insert Game Data</h2>
					<form action="admin.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="game_name">Game Name:</label>
							<input type="text" name="game_name" id="game_name" required>
						</div>
						<div class="form-group">
  <label for="game_type">Game Type:</label>
  <div class="saja2">
    <input type="button" class="btn-type" value="MOBILE" onclick="setGameType('MOBILE')" required>
    <input type="button" class="btn-type" value="PC" onclick="setGameType('PC')" required>
    <input type="button" class="btn-type" value="CONSOLE" onclick="setGameType('CONSOLE')" required>
  </div>
  <input type="hidden" name="game_type" id="game_type" required>
</div>
						<div class="form-group">
						<label for="game_image">Game Image:</label>
							<input type="file" name="game_image[]" id="game_image" placeholder="Game Name" multiple required>
						</div>
						<div class="form-group">
		<label for="game_banner">Game Banner:</label>
		<input type="file" name="game_banner[]" id="game_banner" placeholder="Game Banner" multiple required>
	</div>
						
						<div class="form-group">
							<label for="game_type">Ingame Currency Name:</label>
							<input type="text" name="currency_name" id="currency_name"  required>
						</div>
						<div class="form-group">
							<label for="currency_price1"> 1/ Ingame Currency | Real Currency :</label>
							<div class="saja">
								<input type="text" name="currency_price1" id="currency_price1" required>
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price1" id="real_price1" required>
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price2"> 2/ Ingame Currency | Real Currency :</label>
							<div class="saja">
								<input type="text" name="currency_price2" id="currency_price2" >
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price2" id="real_price2" >
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price3"> 3/ Ingame Currency | Real Currency :</label>
							<div class="saja">
								<input type="text" name="currency_price3" id="currency_price3" >
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price3" id="real_price3" >
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price4"> 4/ Ingame Currency | Real Currency :</label>
							<div class="saja">
								<input type="text" name="currency_price4" id="currency_price4" >
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price4" id="real_price4" >
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price5"> 5/ Ingame Currency | Real Currency :</label>
							<div class="saja">
								<input type="text" name="currency_price5" id="currency_price5" >
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price5" id="real_price5" >
							</div>
						</div>
						<button type="submit" class="btn-insert">Insert</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>

	<div class="right-part">
		<div class="product-all">
			<div class="product">
				<div class="title-product">
					<h2 class="product-list_title">GAME DATA</h2>
				</div>
				<?php
				// Check if the form is submitted
				if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_name']) && isset($_POST['game_type']) && isset($_POST['currency_name'])) {
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "Offline_Pocket";

					$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");


					

					
					// Get the form data

					$gameName = $_POST['game_name'];
					$gameType = $_POST['game_type'];
					$currencyName = $_POST['currency_name'];
					$currencyPrice1 = $_POST['currency_price1'] ?? "";
					$currencyPrice2 = $_POST['currency_price2'] ?? "";
					$currencyPrice3 = $_POST['currency_price3'] ?? "";
					$currencyPrice4 = $_POST['currency_price4'] ?? "";
					$currencyPrice5 = $_POST['currency_price5'] ?? "";
					$realPrice1 = $_POST['real_price1'] ?? "";
					$realPrice2 = $_POST['real_price2'] ?? "";
					$realPrice3 = $_POST['real_price3'] ?? "";
					$realPrice4 = $_POST['real_price4'] ?? "";
					$realPrice5 = $_POST['real_price5'] ?? "";

					// Perform any necessary validation or sanitization of the data

					$targetDir = 'pocketImage/sementara/';
					$uploadedFiles = [];
					$fileCount = count($_FILES['game_image']['name']);

					for ($i = 0; $i < $fileCount; $i++) {
						$fileName = $_FILES['game_image']['name'][$i];
						$tmpFilePath = $_FILES['game_image']['tmp_name'][$i];
						$targetFilePath = $targetDir . $fileName;

						if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
							$uploadedFiles[] = $targetFilePath;
						}
					}
					
					 $targetDir = 'pocketImage/sementara/';
					$uploadedBanners = [];
					$bannerCount = count($_FILES['game_banner']['name']);

					for ($i = 0; $i < $bannerCount; $i++) {
					$bannerName = $_FILES['game_banner']['name'][$i];
					$tmpBannerPath = $_FILES['game_banner']['tmp_name'][$i];
					$targetBannerPath = $targetDir . $bannerName;

					if (move_uploaded_file($tmpBannerPath, $targetBannerPath)) {
						$uploadedBanners[] = $targetBannerPath;
					}
					}
					

					// Perform database insertion
					// Perform database insertion
if (!empty($uploadedFiles) && !empty($uploadedBanners)) {
    // Use prepared statements to safely insert data into the database
    $stmt = $connect->prepare("INSERT INTO gameData (gameName, gameType, gameImage, gameBanner, nameIngameCurrency, ingameCurrency1, realCurrency1, ingameCurrency2, realCurrency2, ingameCurrency3, realCurrency3, ingameCurrency4, realCurrency4, ingameCurrency5, realCurrency5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    foreach ($uploadedFiles as $key => $filePath) {
        $bannerPath = $uploadedBanners[$key];
		$sql = "INSERT INTO gameData (gameName, gameType, gameImage, gameBanner, nameIngameCurrency, ingameCurrency1, realCurrency1, ingameCurrency2, realCurrency2, ingameCurrency3, realCurrency3, ingameCurrency4, realCurrency4, ingameCurrency5, realCurrency5) VALUES 
		('$gameName','$gameType','$filePath','$bannerPath','$currencyName','$currencyPrice1','$realPrice1','$currencyPrice2','$realPrice2','$currencyPrice3','$realPrice3','$currencyPrice4','$realPrice4','$currencyPrice5','$realPrice5')";

if (!mysqli_query($connect, $sql)) {
	echo "<p>Failed to insert file paths into the database.</p>";
        }
    }

    $stmt->close();
    echo "<script>alert('Game Data Successfull Insert');</script>";
} else {
    echo "<p>Failed to upload files or banners.</p>";
}

					

					// Close the database connection
					mysqli_close($connect);
				}

				// Retrieve and display the game data
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "offline_pocket";

				$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

				$sql = "SELECT * FROM gameData";
				$result = mysqli_query($connect, $sql);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

						echo '<div class="product-list_item">';
						echo '<div class="product-list_container">';
						echo '<div class="game-type">Game Type: ' . $row['gameType'] . '</div>';
						echo '<a href="transaction2.php?id=" class="product-tile_link">';
						echo '<img src="' . $row['gameImage'] . '" alt="Game Image" class="product-tile_image">';
						echo '<div class="product-tile_clip-path"></div>';
						echo '<div class="product-tile_item-title">';
						echo $row['gameName'];
						echo '</div>';
						echo '</a>';
						
						echo '</div>';
						echo '<div class="detail">';
						
						echo '<table class="price-table">';
						echo '<tr>';
						echo '<th>Ingame Price: ' . $row['nameIngameCurrency'] . '</th>';
						echo '<th>Real Price: (RM)</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>' . $row['ingameCurrency1'] . '</td>';
						echo '<td>' . $row['realCurrency1'] . '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>' . $row['ingameCurrency2'] . '</td>';
						echo '<td>' . $row['realCurrency2'] . '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>' . $row['ingameCurrency3'] . '</td>';
						echo '<td>' . $row['realCurrency3'] . '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>' . $row['ingameCurrency4'] . '</td>';
						echo '<td>' . $row['realCurrency4'] . '</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>' . $row['ingameCurrency5'] . '</td>';
						echo '<td>' . $row['realCurrency5'] . '</td>';
						echo '</tr>';
						echo '</table>';
						echo '<div class="button-group">';
						echo '<form action="admin.php" method="post" class="delete-form">';
						echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
						echo '<button type="submit" class="btn-delete" onclick="reloadPage()" name="btn-delete">Delete</button>';
						echo '</form>';
						echo '<form action="adminEdit.php?id=' . $row['id'] . '" method="post" class="edit-form">';
						echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
						echo '<button type="submit" class="btn-edit" name="btn-edit">Edit</button>';
						echo '</form>';
						
						
						echo '</form>';
						echo '</div>';
						echo '</div>'; // .detail
						echo '</div>'; // .product-list_item
					}
				} else {
					echo "<p>No game data available.</p>";
				}

				// Close the database connection
				mysqli_close($connect);
				?>

				<?php
				// Check if the form is submitted for deletion
				if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "Offline_Pocket";

					$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

					$id = $_POST['id'];

					// Delete the corresponding record from the database
					$sql = "DELETE FROM gameData WHERE id = '$id'";
					if (mysqli_query($connect, $sql)) {
						echo "<script>alert('Game Data Successfull Delete');</script>";
						echo "<script>window.location.href = window.location.href;</script>"; // Redirect to the same page after deletion
						
						
  
					} else {
						echo "<p>Error deleting record: " . mysqli_error($connect) . "</p>";
					}

					// Close the database connection
					mysqli_close($connect);
				}
				?>
			</div>
			
		</div>
	</div>
</div>

<script>

function setGameType(gameType) {
  var input = document.getElementById('game_type');
  input.value = gameType;
  
  var buttons = document.getElementsByClassName('btn-type');
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove('selected');
  }
  
  event.target.classList.add('selected');
}



var productTiles = document.getElementsByClassName('product-list_item');
		var originalDisplayStyle = []; // Array to store the original display style of each product tile

		function updateSectionDisplay(sectionId) {
			for (var section in sections) {
				sections[section].style.display = section === sectionId ? 'block' : 'none';
			}
		}

		btnAll.addEventListener('click', function () {
			updateSectionDisplay('all-section');
			showAllProducts();
		});

		btnMobile.addEventListener('click', function () {
			updateSectionDisplay('mobile-section');
			showAllProducts();
		});

		btnPc.addEventListener('click', function () {
			updateSectionDisplay('pc-section');
			showAllProducts();
		});

		btnConsole.addEventListener('click', function () {
			updateSectionDisplay('console-section');
			showAllProducts();
		});

		function showAllProducts() {
			for (var i = 0; i < productTiles.length; i++) {
				productTiles[i].style.display = originalDisplayStyle[i] || 'flex';
			}
		}

		// Store the original display style of each product tile
		for (var i = 0; i < productTiles.length; i++) {
			originalDisplayStyle.push(productTiles[i].style.display);
		}
		
		// Reload page function
  function reloadPage() {
    location.reload();
  }

		// Searching
		function handleSearch(event) {
			if (event.key === "Enter") {
				event.preventDefault(); // Prevent form submission and page reload

				// Get the input value
				var searchValue = document.getElementById('searchInput').value;

				// Loop through each product tile and check if it matches the search value
				for (var i = 0; i < productTiles.length; i++) {
					var title = productTiles[i].querySelector('.product-tile_item-title').innerHTML;

					// If the search value is found in the title, show the product tile, otherwise hide it
					if (title.toLowerCase().includes(searchValue.toLowerCase())) {
						productTiles[i].style.display = 'flex';
					} else {
						productTiles[i].style.display = 'none';
					}
				}

				return false; // Prevent form submission and page reload
			}
		}

		// Add an event listener to the search input
		document.getElementById('searchInput').addEventListener('input', handleSearch);
		
		
  





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
	
	 function confirmLogout() {
      if (window.confirm('Are you sure you want to logout?')) {
        window.location.href = 'logout.php'; // Redirect to the PHP script that handles the logout
      } else {
        // User canceled the logout, do nothing or add some action if required
      }
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
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
