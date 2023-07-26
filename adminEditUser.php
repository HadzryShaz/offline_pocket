<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" type="text/css" href="adminEditUserStyle.css">
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




    <h1>List of Registered Users</h1>
    <div class="user-list">
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";

        $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

        $sql = "SELECT * FROM users";

        $sendsql = mysqli_query($connect, $sql);

        if ($sendsql) {
            echo "<table>
                        <tr>
                            <th>User ID</th>
                            <th>User Username</th>
                            <th>User Email</th>
                            <th>User Password</th>
                            <th>Action</th>
                        </tr>";

            foreach ($sendsql as $row) {
               echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td id=\"rowUser\">" . $row["user_username"] . "</td>";
                echo "<td>" . $row["user_email"] . "</td>";
                echo "<td>" . $row["user_password"] . "</td>";
              
				
				
				echo "<td>";
               echo '<form action="deleteUser.php?user_id=' . $row['user_id'] . '" method="post" class="delete-form">';
			   echo '<input type="hidden" name="id" value="' . $row['user_id'] . '">';
				echo '<button type="submit" class="btn-delete" onclick="reloadPage()" name="btn-delete">Delete</button>';
				echo '</form>';
				
              echo '<form action="editUser.php?user_id=' . $row['user_id'] . '" method="post" class="edit-form">';
			  echo '<input type="hidden" name="id" value="' . $row['user_id'] . '">';
			  echo '<button type="submit" class="btn-edit" name="btn-edit">Edit</button>';
			  echo '</form>';
			  echo "</td>";	
				
				
                echo "</tr>";
            }

            echo "</table>";
            echo "<a href='admin.php' class='back-btn'>Back</a>";
        } else {
            echo "<p>Failed.</p>";
        }
        ?>
    </div>
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
		
	

 
    // Searching
    function handleSearch(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent form submission and page reload

            // Get the input value
            var searchValue = document.getElementById('searchInput').value.toLowerCase();

            // Get the list of user rows
            var userRows = document.getElementsByClassName("user-list")[0].getElementsByTagName("tr");

            // Loop through each user row and check if it matches the search value
            for (var i = 1; i < userRows.length; i++) {
                var userRow = userRows[i];
                var userUsername = userRow.getElementsByTagName("td")[1].innerText.toLowerCase();

                // If the search value is found in the username, show the user row, otherwise hide it
                if (userUsername.includes(searchValue)) {
                    userRow.style.display = 'table-row';
                } else {
                    userRow.style.display = 'none';
                }
            }

            return false; // Prevent form submission and page reload
        }
    }

    // Add an event listener to the search input
    document.getElementById('searchInput').addEventListener('input', handleSearch);
	
	
	
	
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
