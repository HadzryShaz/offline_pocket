<html>

<header>

</header>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Offline_Pocket";

    $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

    // Get the game name from the form submission
    $gameName = $_POST['id'];

    // Delete the corresponding record from the database
    $sql = "DELETE FROM gameData WHERE gameName = '$gameName'";
    if (mysqli_query($connect, $sql)) {
        echo "<p>Data deleted successfully.</p>";
    } else {
        echo "<p>Failed to delete data.</p>";
    }

    // Close the database connection
    mysqli_close($connect);
}
?>





</body>


</html>