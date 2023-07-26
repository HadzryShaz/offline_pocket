<html>
<?php session_start(); ?>
    <head>
	<title>Offline Pocket | Online Game Top up Website</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="stylePocket.css" rel="stylesheet" type="text/css" />
	<link href="loginStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<style>
	
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0B2447;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
			color:white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #45a049;
        }
    </style>
   

	
	
	
	
	
	
	
	
	
	
	
	
	
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";
     
        $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

        $user_id= $_GET["user_id"];
     
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
     
        $sendsql = mysqli_query($connect, $sql);

        $data = mysqli_fetch_array($sendsql); //fetch data
     
        if(isset($_POST["edit"])){
            $user_id = $_POST["user_id"];
            $user_username = $_POST["user_username"];
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];

            $sql2 = "UPDATE users SET user_id = '$user_id',user_username='$user_username',
            user_email='$user_email',user_password='$user_password' 
            WHERE user_id = '$user_id'";
			
			

            $sendsql2 = mysqli_query($connect, $sql2);

            if ($sendsql2) {
				
				 
                mysqli_close($connect); //close connection
				$_SESSION['currentUser'] = $user_username;
				$_SESSION['currentEmail'] = $user_email;
				$_SESSION['currentID'] = $user_id;
				$_SESSION['currentPassword'] = $user_password;
				
						
                 echo "<script>alert('Your profile succesfully updated.');</script>";
				 echo "<script>window.location.href = ' userProfile.php?user_id=$user_id';</script>";
        
            }else {
                echo mysqli_error($connect);
            }
        }
        ?>

    </head>
    <body style=" font-family: Arial, sans-serif;
            background-color: #0B2447;">
			
			
			
			
			
			
			
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
    } else {
        $currentUser = 'PROFILE';
        $currentEmail = 'PROFILE';
    }
} else if (isset($_SESSION['currentUser'])) {
    $currentUser = $_SESSION['currentUser'];
    $currentEmail = $_SESSION['currentEmail'];
	$currentID = $_SESSION['currentID'];
} else {
    $currentUser = 'PROFILE';
    $currentEmail = 'PROFILE';
}
?>
		
		<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		
			<a href="homeScreen.php" style="background-color:black;">HOME</a>
				<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
				<a href="#" class="w3-bar-item w3-button"><?php echo $currentUser;?></a>
				
				
				</div>
	<a href="userProfile.php?user_id=<?php echo $currentID; ?>">Update User Profile</a>

		<a href="history.php">Transaction History</a>
		
	</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
        <h1 style="text-align: center;">User Information</h1> 

        <form action="" method="post">
            <fieldset>
              

            

                <label for="user_username">Username &emsp; &emsp; : </label>
                <input type="text" name="user_username" id="user_username" value="<?php echo $data["user_username"] ?>"> <br><br>

                <label for="user_email">E-mail &emsp; &emsp; &emsp; &nbsp;:</label>
                <input type="text" name="user_email" id="user_email" value="<?php echo $data["user_email"] ?>"> <br><br>

                <label for="user_password">Password &emsp; &emsp; &emsp; &ensp;:</label>
                <input type="text" name="user_password" id="user_password" value="<?php echo $data["user_password"] ?>"> <br><br>
				<input type="hidden" name="user_id"      value="<?php echo $data["user_id"] ?> ">
            </fieldset>

            <br>

            <div style="text-align: center;">
                <input type="submit" id="button" name="edit" value="Edit">     
            </div>
        </form>
		
		<script>
		 function confirmLogout() {
      if (window.confirm('Are you sure you want to logout?')) {
        window.location.href = 'logout.php'; // Redirect to the PHP script that handles the logout
      } else {
        // User canceled the logout, do nothing or add some action if required
      }
    }
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "300px";
		document.getElementById("all").style.opacity = "0.3";
		document.body.classList.add("sidenav-open");
	}
	
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("all").style.opacity = "1";
		document.body.classList.remove("sidenav-open");
	}
		
		
		
		
		</script>
		
		
		
		
		
		
    </body>
</html>