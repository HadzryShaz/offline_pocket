<html>

<head>
    <link href="stylePocket.css" rel="stylesheet" type="text/css" />
    <link href="loginStyle.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<!-------------------------ALL SECTION-------------------------------------------->
<div class="all-section" id="all-section">
    <div class="product">
        <div class="title-product">
            <h2 class="product-list_title">ALL GAMES</h2>
        </div>
        <div class="product-list_item">
            <?php
            // Retrieve and display the game data
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Offline_Pocket";

            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

            $sql = "SELECT * FROM gameData";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container">';
					echo '<a href="transaction2.php?id=' . $row['id'] . '" class="product-tile_link">';
                    echo '<img src="' . $row['gameImage'] . '" alt="Game Image" class="product-tile_image">';
                    echo '<div class="product-tile_clip-path"></div>';
                    echo '<div class="product-tile_item-title">';
					echo '</form>';
                    echo $row['gameName'];
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No game data available.</p>";
            }

            // Close the database connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</div>

<div class="mobile-section" id="mobile-section">
    <div class="product">
        <div class="title-product">
            <h2 class="product-list_title">MOBILE GAMES</h2>
        </div>
        <div class="product-list_item">
            <?php
            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");
            $sql = "SELECT * FROM gameData WHERE gameType = 'Mobile'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container">';
                    echo '<a href="transaction2.php?id=' . $row['id'] . '" class="product-tile_link">';
                    echo '<img src="' . $row['gameImage'] . '" alt="Game Image" class="product-tile_image">';
                    echo '<div class="product-tile_clip-path"></div>';
                    echo '<div class="product-tile_item-title">';
                    echo $row['gameName'];
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No mobile games available.</p>";
            }

            // Close the database connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</div>

<div class="pc-section" id="pc-section">
    <div class="product">
        <div class="title-product">
            <h2 class="product-list_title">PC GAMES</h2>
        </div>
        <div class="product-list_item">
            <?php
            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");
            $sql = "SELECT * FROM gameData WHERE gameType = 'PC'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container">';
                    echo '<a href="transaction2.php?id=' . $row['id'] . '" class="product-tile_link">';
                    echo '<img src="' . $row['gameImage'] . '" alt="Game Image" class="product-tile_image">';
                    echo '<div class="product-tile_clip-path"></div>';
                    echo '<div class="product-tile_item-title">';
                    echo $row['gameName'];
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No PC games available.</p>";
            }

            // Close the database connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</div>

<div class="console-section" id="console-section">
    <div class="product">
        <div class="title-product">
            <h2 class="product-list_title">CONSOLE GAMES</h2>
        </div>
        <div class="product-list_item">
            <?php
            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");
            $sql = "SELECT * FROM gameData WHERE gameType = 'Console'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container">';
                   echo '<a href="transaction2.php?id=' . $row['id'] . '" class="product-tile_link">';
                    echo '<img src="' . $row['gameImage'] . '" alt="Game Image" class="product-tile_image">';
                    echo '<div class="product-tile_clip-path"></div>';
                    echo '<div class="product-tile_item-title">';
                    echo $row['gameName'];
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No console games available.</p>";
            }

            // Close the database connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</div>

<script>
	// Game Type
		var btnAll = document.querySelector('.btnAll');
		var btnMobile = document.querySelector('.btnMobile');
		var btnPc = document.querySelector('.btnPc');
		var btnConsole = document.querySelector('.btnConsole');

		var sections = {
			'all-section': document.getElementById('all-section'),
			'mobile-section': document.getElementById('mobile-section'),
			'pc-section': document.getElementById('pc-section'),
			'console-section': document.getElementById('console-section')
		};

		var productTiles = document.getElementsByClassName('product-list_container');

		var originalDisplayStyle = []; // Array to store the original display style of each product tile

		function updateSectionDisplay(sectionId) {
			for (var section in sections) {
				sections[section].style.display = section === sectionId ? 'block' : 'none';
			}
		}

		btnAll.addEventListener('click', function () {
			updateSectionDisplay('all-section');
			showAllProducts();
			scrollToMiddleSection1();
		});

		btnMobile.addEventListener('click', function () {
			updateSectionDisplay('mobile-section');
			showAllProducts();
			scrollToMiddleSection2();
		});

		btnPc.addEventListener('click', function () {
			updateSectionDisplay('pc-section');
			showAllProducts();
			scrollToMiddleSection3();
		});

		btnConsole.addEventListener('click', function () {
			updateSectionDisplay('console-section');
			showAllProducts();
			scrollToMiddleSection4();
		});

		function showAllProducts() {
			for (var i = 0; i < productTiles.length; i++) {
				productTiles[i].style.display = originalDisplayStyle[i] || 'block';
			}
		}

		// Store the original display style of each product tile
		for (var i = 0; i < productTiles.length; i++) {
			originalDisplayStyle.push(productTiles[i].style.display);
		}
		
		
	
	
	</script>



</body>
</html>
