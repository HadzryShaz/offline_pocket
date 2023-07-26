
<!DOCTYPE html>




			
<html>
<head>
	<title>Offline Pocket | Online Game Top up Website</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="stylePocket.css" rel="stylesheet" type="text/css" />
	<link href="loginStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400&display=swap" rel="stylesheet">
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
		$currentID = $_SESSION['currentID'];
		$updateProfile ='Update Profile';
    } else {
        $currentUser = 'No Profile';
        $currentEmail = '';
		$updateProfile ='';
    }
} else if (isset($_SESSION['currentUser'])) {
    $currentUser = $_SESSION['currentUser'];
    $currentEmail = $_SESSION['currentEmail'];
	$currentID = $_SESSION['currentID'];
	$updateProfile ='Update Profile';
} else {
    $currentUser = 'No Profile';
    $currentEmail = '';
	$updateProfile ='';
}
?>
		
		<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		
			
				<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
				<a style="background-color:white; color:black; font-family: 'Kanit', sans-serif; font-size:30px; font-weight:bold;" class="w3-bar-item w3-button"><?php echo $currentUser;?></a>
				<a href="homeScreen.php" style="font-family: 'Kanit', sans-serif; font-size:25px; font-weight:bold;">HOME</a>
				
				
				</div>
	<a href="userProfile.php?user_id=<?php echo $currentID; ?>" style="font-family: 'Kanit', sans-serif; font-size:25px; font-weight:bold;"><?php echo $updateProfile;?></a>

		<a href="history.php" style="font-family: 'Kanit', sans-serif; font-size:25px; font-weight:bold;">Transaction History</a>
		
	</div>
		
		<br><Br>
	

		  
		<script>
		
		function myProfile() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
	

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
		
	
		
		
		
		
    function confirmLogout() {
      if (window.confirm('Are you sure you want to logout?')) {
        window.location.href = 'logout.php'; // Redirect to the PHP script that handles the logout
      } else {
        // User canceled the logout, do nothing or add some action if required
      }
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
						productTiles[i].style.display = 'block';
					} else {
						productTiles[i].style.display = 'none';
					}
				}
				
				// Scroll to the middle section
					scrollToMiddleSection1();
					scrollToMiddleSection2();
					scrollToMiddleSection3();
					scrollToMiddleSection4();

				return false; // Prevent form submission and page reload
			}
		}

		// Add an event listener to the search input
		document.getElementById('searchInput').addEventListener('input', handleSearch);
		
		// First, get a reference to the button element
const scrollButton = document.getElementById('scrollButton');

// Then, define a function to scroll to the bottom
function scrollToBottom() {
  // Scroll smoothly to the bottom of the page
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: 'smooth'
  });
}

// Attach a click event listener to the button
scrollButton.addEventListener('click', scrollToBottom);
	
	
	
	
  </script>
		</body>
		
		
		</html>