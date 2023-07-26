<!DOCTYPE html>
<html>
<head>
    <title>Game Transaction List</title>
    <link rel="stylesheet" type="text/css" href="adminEditUserStyle.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link href="adminEditStyle.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow:scroll;">
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
    <div class="container " style="margin-top:50px; margin-right:200px;">
        <h1>Game Transaction List</h1>
        <br><br>
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";

        $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

        $sql = "SELECT * FROM ((status INNER JOIN gametransaction ON status.transactionID = gametransaction.transactionID) INNER JOIN users ON status.user_id = users.user_id) "; 

        /*$sql = "SELECT * FROM (status INNER JOIN gametransaction ON status.transactionID = gametransaction.transactionID)";*/

        $sendsql = mysqli_query($connect, $sql);

        if($sendsql){
            echo "<center><table>
                            <tr>
                                <th>transactionID</th>
                                <th>user_id</th>
                                <th>gameID</th>
                                <th>gameName</th>
                                <th>gameType</th>
                                <th>userID</th>
                                <th>userServer</th>
                                <th>realCurrency</th>
                                <th>inGameCurrency</th>
                                <th>paymentType</th>
                                <th>userEmail</th>
                                <th>status_approval</th>
                                <th>status_admin</th>
                                <th>Approval</th>
                            </tr>";

            foreach($sendsql as $row){
                echo "<tr>";
                echo "<td>".$row["transactionID"]."</td>";
                echo "<td>".$row["user_id"]."</td>";
                echo "<td>".$row["gameID"]."</td>";
                echo "<td>".$row["gameName"]."</td>";
                echo "<td>".$row["gameType"]."</td>";
                echo "<td>".$row["userID"]."</td>";
                echo "<td>".$row["userServer"]."</td>";
                echo "<td>".$row["realCurrency"]."</td>";
                echo "<td>".$row["inGameCurrency"]."</td>";
                echo "<td>".$row["paymentType"]."</td>";
                echo "<td>".$row["userEmail"]."</td>";
                echo "<td>".$row["status_approval"]."</td>";    
                echo "<td>".$row["status_admin"]."</td>";
                echo '<td><form action="adminApprove.php" method="get">
                    <input type="radio" id="notApproved" name="status_admin" value="Not Approved">
                    <label for="notApproved">Not Approved</label><br>
                    <input type="radio" id="pending" name="status_admin" value="Pending">
                    <label for="pending">Pending</label><br>
                    <input type="radio" id="refunded" name="status_admin" value="Refunded">
                    <label for="refunded">Refunded</label><br>
                    <input type="radio" id="Approved" name="status_admin" value="Approved">
                    <label for="Approved">Approved</label><br>
                    <input type="hidden" name="user_id" value="' . $row["user_id"] . '">
                    <input type="hidden" name="transactionID" value="' . $row["transactionID"] . '">
                    <input type="submit" value="submit" name="submit">
                  </form></td>';
            }

            echo "</table></center>";
            echo "<br>";
            echo "<center><a href='admin.php'>Back</a></center>";
        } else {
            echo "<p>Failed.</p>";
        }
        ?>
    </div>
	
	<script>
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
</body>
</html>
