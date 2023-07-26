


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
		<style>
* {
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

@font-face {
    font-family: 'PilotCommand';
    src:
        url('PilotCommand.otf') 
        format('opentype');
    font-weight: normal;
    font-style: normal;
}
  
body {
    font-family: 'PilotCommand.otf', sans-serif;
    text-align: center;
}
h2 {
    font-family: 'PilotCommand.otf', sans-serif;
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper {
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
}

.fl-table {
    border-radius: 10px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: whitesmoke;
}

.fl-table td,
.fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: black;
    background: #4fc3a1;
}

.fl-table thead th:nth-child(odd) {
    color: whitesmoke;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: lightgray;
}

/* Responsive */



    </style>

</head>

    <?php include 'header.php';?>

<br><br><br><br><br>
	<body>
    <h2 >TRANSACTION HISTORY</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Game ID</th>
                    <th>transaction Number</th>
                    <th>Game</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
if(isset($_SESSION['currentUser'])){
                            $currentID = $_SESSION['currentID'];
                            
                            }else{
                            $currentID = '';
                            echo "<script>alert('Please register or login to use the service.');</script>";
                            echo "<script>window.location.href = 'homeScreen.php';</script>";
                            };

                // Your PHP code to fetch data from the database and populate the table here...
                // Use the $currentID to fetch user-specific data from the database
                // ...

                // Sample data for demonstration purposes
		$hostname ="localhost";
		$username ="root";
		$password = "";
		$dbname = "offline_pocket";

		$connect = mysqli_connect($hostname,$username,$password,$dbname) or DIE("connection failed.");

		$sql = "SELECT * FROM ((status INNER JOIN gametransaction ON status.transactionID = gametransaction.transactionID) INNER JOIN users ON status.user_id = users.user_id) where status.user_id = $currentID; ";


		$sendsql = mysqli_query($connect, $sql);

                foreach ($sendsql as $row) {
                    echo "<tr>";
                    echo "<td>".$row["userID"]."</td>";
                    echo "<td>".$row["transactionID"]."</td>";
                    echo "<td> ".$row["gameName"]."<p> </p> </td>";
                    echo "<td>currency ".$row["inGameCurrency"]."</td>";
                    echo "<td>RM ".$row["realCurrency"]."</td>";
                    echo "<td>".$row["status_approval"]."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>




	
	
<div class="middle-content">

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

	</script>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>





</body>
</html>
