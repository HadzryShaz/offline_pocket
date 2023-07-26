<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="adminEditStyle.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0B2447;
            padding-top: 30px;
        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 10px;
            width: 200px;
            height: 200px;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .dashboard-card-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .dashboard-card-value {
            font-size: 34px;
            font-weight: bold;
            color: #007bff;
        }

        .dashboard-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            width: 150px;
            border-radius: 5px;
        }

        .dashboard-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="kotak">
		<?php include 'login.php'; ?>
	</div>
	
	<?php
if(isset($_SESSION['currentUser'])){
							$currentID = $_SESSION['currentID'];
							
							}else{
							$currentID = '';
							echo "<script>alert('Please register or login to use the service.');</script>";
							echo "<script>window.location.href = 'homeScreen.php';</script>";
							}; ?>

	
		<nav class="navs">
			<span style="font-size:30px; color:red; padding-left:20px; cursor:pointer" onclick="openNav()">&#9776;</span>
			<div class="logo"><a href="dashboard.php">OFFLINE POCKET<span style="font-size:30px; color:red;" class="material-symbols-outlined" >
			playing_cards</span></a></div>
			<div class="moto">"Upgrade Your Game, Upgrade Your Wallet.</div>
			
			
			<!-- check if user have logged in -->
			<div class="nav-links">
				<?php if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) { ?>
					<ul>
						
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
    <div class="dashboard-container">
        <div class="dashboard-card">
            <div class="dashboard-card-title">Total User</div>
            <?php
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "offline_pocket";

            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

            $sql = "SELECT count(distinct user_id) as 'Total User' from users;";
            $sendsql = mysqli_query($connect, $sql);
            $data = mysqli_fetch_array($sendsql);

            echo "<div class='dashboard-card-value'>".$data["Total User"]."</div>";
            ?>
        </div>
        <div class="dashboard-card">
            <div class="dashboard-card-title">Total Admin</div>
            <?php
            $sql2 = "SELECT count(distinct id) as 'Total Admin' from admin;";
            $sendsql2 = mysqli_query($connect, $sql2);
            $data2 = mysqli_fetch_array($sendsql2);

            echo "<div class='dashboard-card-value'>".$data2["Total Admin"]."</div>";
            ?>
        </div>
        <div class="dashboard-card">
            <div class="dashboard-card-title">Total Game</div>
            <?php
            $sql3 = "SELECT count(distinct id) as 'Total Game' from gamedata;";
            $sendsql3 = mysqli_query($connect, $sql3);
            $data3 = mysqli_fetch_array($sendsql3);

            echo "<div class='dashboard-card-value'>".$data3["Total Game"]."</div>";
            ?>
        </div>
        <div class="dashboard-card">
            <div class="dashboard-card-title">Total Transaction</div>
            <?php
            $sql4 = "SELECT count(distinct transactionID) as 'Total Transaction' from gametransaction;";
            $sendsql4 = mysqli_query($connect, $sql4);
            $data4 = mysqli_fetch_array($sendsql4);

            echo "<div class='dashboard-card-value'>".$data4["Total Transaction"]."</div>";
            ?>
        </div>
    </div>
    <div class="dashboard-container">
        <a class="dashboard-link" href="admin.php">Back</a>
    </div>
	<script>
	 function confirmLogout() {
      if (window.confirm('Are you sure you want to logout?')) {
        window.location.href = 'logout.php'; // Redirect to the PHP script that handles the logout
      } else {
        // User canceled the logout, do nothing or add some action if required
      }
    }
	
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
	</script>
</body>
</html>
