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
<div class="left" id="left">
    
        <div class="tajuk">
            <h2 class="tajukDalam" >POPULAR</h2>
        </div>
        <div class="container-iklan">
            <?php
            // Retrieve and display the game data
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Offline_Pocket";

            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

            $sql = "SELECT * FROM gameData WHERE id % 2 <> 0";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container2">';
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

<div class="right" id="right">
    
        <div class="tajuk">
            <h2 class="tajukDalam">TRENDING</h2>
        </div>
        <div class="container-iklan">
            <?php
            // Retrieve and display the game data
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Offline_Pocket";

            $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

            $sql = "SELECT * FROM gameData where id % 2 = 0";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-list_container2">';
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






</body>
</html>
