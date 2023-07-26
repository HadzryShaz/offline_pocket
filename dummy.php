<!DOCTYPE html>
<html>
<head>
	<title>Edit Game Data</title>
	<link href="adminEditStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">

	
</head>
<body>
<div class="kotak">
		<?php include 'login.php'; ?>
	</div>

	
		<nav class="navs">
			<span style="font-size:30px; color:red; padding-left:20px; cursor:pointer" onclick="openNav()">&#9776;</span>
			<div class="logo"><a href="homeScreen.php">OFFLINE POCKET<span style="font-size:30px; color:red;" class="material-symbols-outlined" >
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
					
					
					<li><a href="aboutUs.php">About Us</a></li>
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
		
			<a>PROFILE</a>
				<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
				<a href="#" class="w3-bar-item w3-button"><?php echo $currentUser;?></a>
				<a href="#" class="w3-bar-item w3-button"><?php echo $currentEmail;?></a>
				
				</div>
		<a href="#">Reload</a>
		<a href="#">Transaction History</a>
		<a href="#">Notification</a>
	</div>

	
<?php
// Retrieve product details from the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "Offline_Pocket";

$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed.");

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    $sql = "SELECT * FROM gameData WHERE id = $productID";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $gameName = $row['gameName'];
        $gameType = $row['gameType'];
        $gameImage = $row['gameImage'];
        $targetBannerPath = $row['gameBanner'];
        $nameIngameCurrency = $row['nameIngameCurrency'];
        $ingameCurrency1 = $row['ingameCurrency1'];
        $realCurrency1 = $row['realCurrency1'];
        $ingameCurrency2 = $row['ingameCurrency2'];
        $realCurrency2 = $row['realCurrency2'];
        $ingameCurrency3 = $row['ingameCurrency3'];
        $realCurrency3 = $row['realCurrency3'];
        $ingameCurrency4 = $row['ingameCurrency4'];
        $realCurrency4 = $row['realCurrency4'];
        $ingameCurrency5 = $row['ingameCurrency5'];
        $realCurrency5 = $row['realCurrency5'];
    }
}

// Perform database update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["update"])) {
    // Get the updated data from the form
    $nameIngameCurrency = $_POST["currency_name"];
    $ingameCurrency1 = $_POST["currency_price1"];
    $realCurrency1 = $_POST["real_price1"];
    $ingameCurrency2 = $_POST["currency_price2"];
    $realCurrency2 = $_POST["real_price2"];
    $ingameCurrency3 = $_POST["currency_price3"];
    $realCurrency3 = $_POST["real_price3"];
    $ingameCurrency4 = $_POST["currency_price4"];
    $realCurrency4 = $_POST["real_price4"];
    $ingameCurrency5 = $_POST["currency_price5"];
    $realCurrency5 = $_POST["real_price5"];

    // Perform file upload for game image and game banner
    $targetDir = 'pocketImage/sementara/';
    $uploadedFiles = [];
    $uploadedBanners = [];

    if (!empty($_FILES['gameImage']['name'])) {
        $fileCount = count($_FILES['gameImage']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['gameImage']['name'][$i];
            $tmpFilePath = $_FILES['gameImage']['tmp_name'][$i];
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                $uploadedFiles[] = $targetFilePath;
            }
        }
    }

    if (!empty($_FILES['game_banner']['name'])) {
        $bannerCount = count($_FILES['game_banner']['name']);

        for ($i = 0; $i < $bannerCount; $i++) {
            $bannerName = $_FILES['game_banner']['name'][$i];
            $tmpBannerPath = $_FILES['game_banner']['tmp_name'][$i];
            $targetBannerPath = $targetDir . $bannerName;

            if (move_uploaded_file($tmpBannerPath, $targetBannerPath)) {
                $uploadedBanners[] = $targetBannerPath;
            }
        }
    }

    if (!empty($uploadedFiles) && !empty($uploadedBanners)) {
        $gameImage = $uploadedFiles[0]; // Assuming only one image is uploaded
        $gameBanner = $uploadedBanners[0]; // Assuming only one banner is uploaded

        $sql = "UPDATE gameData SET 
                gameImage = '$gameImage',
                gameBanner = '$gameBanner',
                nameIngameCurrency = '$nameIngameCurrency',
                ingameCurrency1 = '$ingameCurrency1',
                realCurrency1 = '$realCurrency1',
                ingameCurrency2 = '$ingameCurrency2',
                realCurrency2 = '$realCurrency2',
                ingameCurrency3 = '$ingameCurrency3',
                realCurrency3 = '$realCurrency3',
                ingameCurrency4 = '$ingameCurrency4',
                realCurrency4 = '$realCurrency4',
                ingameCurrency5 = '$ingameCurrency5',
                realCurrency5 = '$realCurrency5'
            WHERE id = $productID";

        if (mysqli_query($connect, $sql)) {
            echo "Data has been successfully updated.";
            echo "<script>window.location.href = 'admin.php';</script>";

        } else {
            echo "Failed to update data: " . mysqli_error($connect);
        }
    } else {
        echo "Failed to upload files or banners.";
    }
}

// Close the database connection
mysqli_close($connect);
?>


	
	
	
	
	
	

	
	
	
	<div class="middle-content" id="all">


	
	
	
	
	

<div class="edit-section">
				<div class="container">
					<h2>Edit Game Data</h2>
					<form action=" " method="post" enctype="multipart/form-data">
					
					  <div class="product-list_item">
					<div class="product-list_container">
				    <a href="#apex" class="product-tile_link">
				   <img src="<?php echo $gameImage; ?>" class="product-tile_image">
				  <div class="product-tile_clip-path"></div>
				  <div class="product-tile_item-title"><?php echo $gameType; ?></div>
				  </a>
			     </div>
					  </div>
					
						<div class="form-group">
							<label for="game_name">Game Name:</label>
							<input type="text" name="game_name" id="game_name"  value="<?php echo $gameName; ?>"required>
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
							<input type="text" name="currency_name" id="currency_name"   value="<?php echo $nameIngameCurrency; ?>"required>
						</div>
						<div class="form-group">
							<label for="currency_price1"> 1/ Ingame Currenct | Real Currencey :</label>
							<div class="saja">
								<input type="text" name="currency_price1" id="currency_price1"  value="<?php echo $ingameCurrency1; ?>" required>
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price1" id="real_price1"  value="<?php echo $realCurrency1; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price2"> 2/ Ingame Currenct | Real Currencey :</label>
							<div class="saja">
								<input type="text" name="currency_price2" id="currency_price2"  value="<?php echo $ingameCurrency2; ?>">
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price2" id="real_price2"  value="<?php echo $realCurrency2; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price3"> 3/ Ingame Currenct | Real Currencey :</label>
							<div class="saja">
								<input type="text" name="currency_price3" id="currency_price3"  value="<?php echo $ingameCurrency3; ?>">
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price3" id="real_price3" value="<?php echo $realCurrency3; ?>" >
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price4"> 4/ Ingame Currenct | Real Currencey :</label>
							<div class="saja">
								<input type="text" name="currency_price4" id="currency_price4"  value="<?php echo $ingameCurrency4; ?>">
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price4" id="real_price4" value="<?php echo $realCurrency4; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="currency_price5"> 5/ Ingame Currenct | Real Currencey :</label>
							<div class="saja">
								<input type="text" name="currency_price5" id="currency_price5" value="<?php echo $ingameCurrency5; ?>" >
								<ion-icon name="reorder-two-outline"></ion-icon>
								<input type="text" name="real_price5" id="real_price5" value="<?php echo $realCurrency5; ?>" >
							</div>
						</div>
						<button type="submit" class="update">Update</button>
					</form>
				</div>
			</div>




</div>
</body>
<script>


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

		// Check user authentication status and toggle visibility of login/logout buttons
		// Modify the condition based on your authentication logic
		



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
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>







</body>
</html>
